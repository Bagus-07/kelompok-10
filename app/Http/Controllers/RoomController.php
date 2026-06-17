<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\TipeKamar;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = TipeKamar::all();

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
            ->where(function ($query) use ($request) {

                $query->where('check_in', '<', $request->check_in)
                    ->where('check_out', '>', $request->check_out);
            })
            ->exists();
            
        if ($existingBooking) {
            return back()->withErrors([
                'room_name' => 'Kamar sudah dibooking pada tanggal tersebut.'
            ]);
        }
        
        // SIMPAN BOOKING
        Booking::create([
            'user_id' => Auth::id(),

            'nama' => Auth::user()->name,
            'kamar' => $request->room_name,
            'tanggal' => now()->toDateString(),

            'room_name' => $request->room_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $request->total_price,

            'payment_method' => null,
            'status' => 'pending'
        ]);

        return redirect()->route('payment');
    }
}