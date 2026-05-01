<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
}

use Illuminate\Http\Request;

public function update(Request $request)
{
    $user = auth()->user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    $user->save();

    return redirect()->back();
}
