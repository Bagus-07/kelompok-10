<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = [
            [
                'nama' => 'Deluxe Room',
                'harga' => 999999,
                'deskripsi' => 'Luxury room with king-sized bed and sea view',
                'gambar' => 'room1.jpg'
            ],
            [
                'nama' => 'Family Suite',
                'harga' => 799999,
                'deskripsi' => 'Perfect for family vacation with spacious living area',
                'gambar' => 'room2.jpg'
            ]
        ];

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