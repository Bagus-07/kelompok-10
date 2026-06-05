<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
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