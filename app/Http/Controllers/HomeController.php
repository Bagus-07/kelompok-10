<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $nama = "Teddy";
        $pekerjaan = "programmer";

        // GET REVIEWS FROM DATABASE
        $reviews = Review::latest()->take(3)->get();

        return view('home', compact(
            'nama',
            'pekerjaan',
            'reviews'
        ));
    }

    public function contact()
    {
        return view('contact');
    }
}