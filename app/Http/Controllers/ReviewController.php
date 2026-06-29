<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
use App\Models\TipeKamar;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required',
            'tipe_kamar_id' => 'required'
        ]);

        $room = TipeKamar::findOrFail(
    $request->tipe_kamar_id
);

    $hasBooking = Booking::where(
            'user_id',
            auth()->id()
        )
        ->where(
            'room_name',
            $room->nama_tipe
        )
        ->where(
            'status',
            'Completed'
        )
        ->exists();

    if (!$hasBooking) {

        return back()->withErrors([
            'review' => 'You can only review rooms you have stayed in.'
        ]);

    }

    Review::create([
        'user_id' => auth()->id(),
        'name' => auth()->user()->name,
        'review' => $request->review,
        'rating' => $request->rating,
        'tipe_kamar_id' => $request->tipe_kamar_id,
    ]);

        return redirect('/home');
    }

    public function destroy(Review $review)
    {
        if ($review->user_id != auth()->id()) {
            abort(403);
        }
    
        $review->delete();
    
        return back()->with('success', 'Review deleted successfully.');
    }
}