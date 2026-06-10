<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', ['user','tamu'])->get();

        return view(
            'pages.user',
            compact('users')
        );
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'User berhasil dihapus');
    }
}
