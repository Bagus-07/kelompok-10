<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeKamar;

class TipeKamarController extends Controller
{
    public function index()
    {
        $tipeKamars = TipeKamar::all();

        return view(
            'pages.kamar',
            compact('tipeKamars')
        );
    }

    public function store(Request $request)
    {
        TipeKamar::create([

            'nama_tipe' => $request->nama_tipe,

            'harga_per_malam' =>
                $request->harga_per_malam,

            'fasilitas' =>
                $request->fasilitas,

            'deskripsi' =>
                $request->deskripsi

        ]);

        return redirect()->back();
    }

        public function update(Request $request, $id)
    {
        $tipeKamar = TipeKamar::findOrFail($id);

        $tipeKamar->update([
            'nama_tipe' => $request->nama_tipe,
            'harga_per_malam' => $request->harga_per_malam,
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()
            ->with('success', 'Tipe kamar berhasil diupdate');
    }

    public function destroy($id)
    {
        TipeKamar::findOrFail($id)->delete();

        return redirect()->back();
    }

}