<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getData()
    {
        $stats = [
            ['title' => 'Total Rooms', 'value' => 25],
            ['title' => 'Booked Rooms', 'value' => 12],
            ['title' => 'Available Rooms', 'value' => 13],
            ['title' => 'Customers', 'value' => 40]
        ];

        return $stats;
    }

    public function tampilkan()
    {
        $data = $this->getData();
        return view('dashboard', compact('data'));
    }
}