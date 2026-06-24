<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;

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

        Kamar::where('id', $booking->kamar_id)
            ->update(['status' => 'Dipakai']);

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

        $booking->kamar->update([
            'status' => 'Tersedia'
        ]);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Booking berhasil ditolak');
    }
}
