<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;

class DashboardController extends Controller
{
    public function tampilkan()
    {
        $users = User::count();
        $bookings = Booking::count();
        $rooms = Room::count();

        $bookingTerbaru = Booking::latest()->take(5)->get();

        return view('dashboard', compact('users', 'bookings', 'rooms', 'bookingTerbaru'));
    }
}