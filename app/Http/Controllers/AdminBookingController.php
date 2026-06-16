<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();

        return view(
            'pages.booking',
            compact('bookings')
        );
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'confirmed'
        ]);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Booking berhasil dikonfirmasi');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'rejected'
        ]);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Booking berhasil ditolak');
    }
}