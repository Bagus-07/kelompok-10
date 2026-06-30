<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;
use App\Models\Kamar;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = Booking::where('user_id', $user->id)
                            ->latest()
                            ->get();

        return view('pages.profile', compact('bookings'));
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

    public function destroy()
    {
        $user = Auth::user();
    
        Auth::logout();
    
        $user->delete();
    
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        return redirect('/')
            ->with('success', 'Account deleted successfully.');
    }

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors([
            'current_password' => 'Current password is incorrect.'
        ]);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Password updated successfully!');
}

public function cancelBooking(Booking $booking)
{
    // Make sure the booking belongs to the logged-in user
    if ($booking->user_id != Auth::id()) {
        abort(403);
    }

    // Only allow cancellation before confirmation
    if (!in_array($booking->status, ['pending', 'waiting_verification'])) {
        return back()->with('error', 'This booking cannot be cancelled.');
    }

    // Update booking status
    $booking->update([
        'status' => 'cancelled',
    ]);

    // Make the room available again
    if ($booking->kamar_id) {
        Kamar::where('id', $booking->kamar_id)
            ->update([
                'status' => 'Tersedia',
            ]);
    }

    return back()->with('success', 'Booking cancelled successfully.');
}
}