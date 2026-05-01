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

        return view('rooms.index', compact('rooms'));
    }
}