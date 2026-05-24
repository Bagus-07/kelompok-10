<?php

namespace App\Http\Controllers;

use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->latest()->get();

        return view('pages.home', compact('reviews'));
    }
}