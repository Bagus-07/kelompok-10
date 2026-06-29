<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        Booking::create([
            'user_id' => Auth::id(),
            'room_name' => $request->room_name,
            'check_in' => now(),
            'check_out' => now()->addDay(),
            'total_price' => $request->total_price,
            'status' => 'pending',
        ]);

        return redirect()->route('payment');
    }
}