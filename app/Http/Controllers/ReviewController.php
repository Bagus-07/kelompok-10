<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);

        Review::create([
            'user_id' => auth()->id(), // IMPORTANT
            'name' => auth()->user()->name,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect('/home');
    }
}