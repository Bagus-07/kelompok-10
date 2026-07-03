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
        $existingBooking = Booking::where('room_name', $request->room_name)
            ->whereIn('status', [
                'waiting_verification',
                'confirmed'
            ])
            ->where(function ($q) use ($checkIn, $checkOut) {

                $q->where('check_in', '<', $checkOut)
                ->where('check_out', '>', $checkIn);

            })

            ->exists();

            if ($existingBooking) {
                return back()->withErrors([
                    'room_name' => 'Kamar sudah dibooking pada tanggal tersebut.'
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

                // Calculate the number of nights
        $nights = $checkIn->copy()->diffInDays($checkOut);

        // Get the room price from the room type
        $pricePerNight = $kamar->tipeKamar->harga_per_malam;

        // Calculate total price
        $totalPrice = $pricePerNight * $nights;
        // SIMPAN BOOKING
        Booking::create([

            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,

            'kamar' => $kamar->nomor_kamar,
            'tanggal' => now()->toDateString(),

            'room_name' => $request->room_name,
            'check_in' => $checkIn,
            'check_out' => $checkOut,

            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        return redirect()->route('payment');
    }
}