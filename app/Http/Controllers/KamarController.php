<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();

        return view(
            'kamar',
            compact('kamars')
        );
    }

    public function store(Request $request)
    {
        Kamar::create([

            'nomor_kamar' => $request->nomor_kamar,

            'status' => $request->status

        ]);

        return redirect()->back()
            ->with('success', 'Kamar berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Kamar::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Kamar berhasil dihapus');
    }
}