<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required',
        ]);

        $checkIn = Carbon::parse($request->check_in_date)
            ->setTime(14, 0, 0);

        $checkOut = Carbon::parse($request->check_out_date)
            ->setTime(12, 0, 0);

        Booking::create([
            'user_id' => Auth::id(),
            'room_name' => $request->room_name,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        return redirect()->route('payment');
    }
}