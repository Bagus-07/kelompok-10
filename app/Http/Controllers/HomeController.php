<?php

namespace App\Http\Controllers;

use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = collect();

        return view('pages.home', compact('reviews'));
    }
}