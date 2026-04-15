<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getData()
    {
        $rooms = [
            ['id' => 1, 'nama' => 'Deluxe Room', 'harga' => 500000],
            ['id' => 2, 'nama' => 'Superior Room', 'harga' => 350000],
            ['id' => 3, 'nama' => 'Standard Room', 'harga' => 250000]
        ];

        return $rooms;
    }

    public function tampilkan()
    {
        $data = $this->getData();
        return view('product', compact('data'));
    }
}