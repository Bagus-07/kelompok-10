<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\TipeKamar;
use App\Models\Kamar;

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
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // CEK APAKAH KAMAR SUDAH DIBOOKING
        $existingBooking = Booking::where('room_name', $request->room_name)
            ->whereIn('status', [
                'pending',
                'waiting_verification',
                'confirmed'
            ])
            ->where(function ($q) use ($request) {

                $q->where('check_in', '<', $request->check_out)
                ->where('check_out', '>', $request->check_in);

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
        // SIMPAN BOOKING
        Booking::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'kamar' => $kamar->nomor_kamar,
            'tanggal' => now()->toDateString(),
            'room_name' => $request->room_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,
            'status' => 'pending'
        ]);
        
        $kamar->update([
            'status' => 'Terisi'
        ]);
        
        dd('Reached here');


        return redirect()->route('payment');
    }
}
