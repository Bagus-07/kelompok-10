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

        return view('pages.dashboard', compact(
            'users',
            'bookings',
            'rooms',
            'bookingTerbaru'
        ));
    }

    // LAPORAN
    public function laporan()
    {
        $totalBooking = Booking::count();

        $totalPendapatan = Booking::sum('harga');

        $kamarTerisi = Room::where('status', 'Penuh')->count();

        $bookings = Booking::latest()->get();

        return view('pages.laporan', compact(
            'totalBooking',
            'totalPendapatan',
            'kamarTerisi',
            'bookings'
        ));
    }
}