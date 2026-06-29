<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\TipeKamar;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        // Show ALL room types
        $roomTypes = TipeKamar::all();

        return view('pages.home', compact(
            'reviews',
            'roomTypes'
        ));
    }
}