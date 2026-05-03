<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = Booking::where('user_id', $user->id)
                            ->latest()
                            ->get();

        return view('profile', compact('bookings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads'), $filename);

        $user->profile_photo = $filename;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile updated!');
    }
}