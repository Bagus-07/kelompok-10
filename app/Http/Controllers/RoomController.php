<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // Data dummy (sementara, karena fokus MVC)
        $rooms = [
            [
                'nama' => 'Deluxe Room',
                'tipe' => 'Deluxe',
                'harga' => 500000,
                'status' => 'Tersedia'
            ],
            [
                'nama' => 'Superior Room',
                'tipe' => 'Superior',
                'harga' => 350000,
                'status' => 'Booked'
            ],
            [
                'nama' => 'Standard Room',
                'tipe' => 'Standard',
                'harga' => 250000,
                'status' => 'Tersedia'
            ]
        ];

        return view('rooms.index', compact('rooms'));
    }
}