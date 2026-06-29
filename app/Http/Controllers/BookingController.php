<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function cancel(Booking $booking)
    {
        // Make sure the booking belongs to the logged-in user
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        // Only pending bookings can be cancelled
        if ($booking->status != 'pending') {
            return back()->with('error', 'Booking cannot be cancelled.');
        }
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'Booking cannot be cancelled.');
        }

        $booking->update([
            'status' => 'Cancelled'
        ]);

        return back()->with('success', 'Booking cancelled successfully.');
    }
}