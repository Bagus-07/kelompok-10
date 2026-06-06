<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking; // tambahkan ini

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $booking = Booking::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('payment.index', compact('user', 'booking'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'bank' => 'required_if:payment_method,Transfer Bank',
        ]);

        return view('payment.confirmation', [
            'payment_method' => $request->payment_method,
            'bank' => $request->bank
        ]);
    }
}