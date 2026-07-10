<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\TipeKamar;
use App\Models\Kamar;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = TipeKamar::query();

        if ($request->filled('room_type')) {
            $query->where(
                'nama_tipe',
                $request->room_type
            );
        }

        $rooms = $query->get();

        $check_in = $request->check_in;
        $check_out = $request->check_out;
        $guests = $request->guests;

        return view('pages.rooms', compact(
            'rooms',
            'check_in',
            'check_out',
            'guests'
        ));
    }

    public function book(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Jam opresional hotel
        $hotelCheckInHour = 14;
        $hotelCheckOutHour = 12;
        
        // Menggabungkan tanggal yang dipilih tamu dengan jam hotel
        $checkIn = Carbon::parse($request->check_in)
        ->setTime($hotelCheckInHour, 0);
        
        $checkOut = Carbon::parse($request->check_out)
        ->setTime($hotelCheckOutHour, 0);

        // CEK APAKAH KAMAR SUDAH DIBOOKING
        $kamar = Kamar::whereHas('tipeKamar', function ($q) use ($request) {

                $q->where('nama_tipe', $request->room_name);

            })
            ->where('status', 'Tersedia')
            ->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {

                $q->whereIn('status', [
                    'waiting_verification',
                    'confirmed'
                ])
                ->where('check_in', '<', $checkOut)
                ->where('check_out', '>', $checkIn);

            })
            ->first();

            if (!$kamar) {

                return back()->withErrors([
                    'room_name' => 'Semua kamar tipe tersebut sudah penuh pada tanggal yang dipilih.'
                ]);
            }

        // Booking akan mengefek kamar
        $kamar = Kamar::whereHas('tipeKamar', function ($q) use ($request) {

            $q->where(
                'nama_tipe',
                $request->room_name
            );

        })
        ->where('status', 'Tersedia')
        ->first();

        if (!$kamar) {

            return back()->withErrors([
                'room_name' => 'Tidak ada kamar tersedia.'
            ]);
        }

        // Hitung jumlah malam
        $nights = Carbon::parse($request->check_in)
            ->diffInDays(
                Carbon::parse($request->check_out)
            );

        // Baru tambahkan jam hotel
        $checkIn = Carbon::parse($request->check_in)
            ->setTime(14,0);

        $checkOut = Carbon::parse($request->check_out)
            ->setTime(12,0);

        // Harga
        $pricePerNight = $kamar->tipeKamar->harga_per_malam;

        $totalPrice = $pricePerNight * $nights;
        // SIMPAN BOOKING
        Booking::create([

            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,

            'kamar' => $kamar->nomor_kamar,
            'kamar_id' => $kamar->id,
            'tanggal' => now()->toDateString(),

            'room_name' => $request->room_name,
            'check_in' => $checkIn,
            'check_out' => $checkOut,

            'total_price' => $totalPrice,
            'status' => 'pending',
            'booking_source' => 'online'
        ]);

        return redirect()->route('payment');
    }
}