<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

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

    $booking = Booking::where('user_id', Auth::id())
        ->latest()
        ->first();

    if ($booking->kamarDetail) {
        $booking->kamarDetail->update([
            'payment_method' => $request->payment_method,
        ]);
    }

    return view('payment.confirmation', [
        'payment_method' => $request->payment_method,
        'bank' => $request->bank
    ]);
}

    public function uploadProof(Request $request)
{
    $request->validate([
        'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = $request->file('payment_proof')
                    ->store('payment_proofs', 'public');

    $booking = Booking::where('user_id', Auth::id())
                ->latest()
                ->first();

    if ($booking->kamarDetail) {

        $booking->kamarDetail->update([
            'payment_proof' => $path,
            'status' => 'waiting_verification'
        ]);
    }
    
    return redirect()->route('payment.success');
}
}