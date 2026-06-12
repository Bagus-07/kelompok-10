<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = [
            [
                'nama' => 'Deluxe Room',
                'harga' => 500000,
                'deskripsi' => 'Spacious room with king-size bed',
                'gambar' => 'room1.jpg'
            ],
            [
                'nama' => 'Superior Room',
                'harga' => 350000,
                'deskripsi' => 'Comfortable room for couples',
                'gambar' => 'room2.jpg'
            ],
            [
                'nama' => 'Standard Room',
                'harga' => 250000,
                'deskripsi' => 'Affordable room with basic facilities',
                'gambar' => 'room3.jpg'
            ]
        ];

        return view('pages.rooms', compact('rooms'));
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