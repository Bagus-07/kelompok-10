<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeKamar;
use App\Models\Kamar;

class TipeKamarController extends Controller
{
    public function index()
    {
        $tipeKamars = TipeKamar::with('kamars')->get();

        return view(
            'pages.kamar',
            compact('tipeKamars')
        );
    }

    public function store(Request $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request
                ->file('gambar')
                ->store('tipe-kamar', 'public');
        }

        TipeKamar::create([
            'nama_tipe'         => $request->nama_tipe,
            'harga_per_malam'   => $request->harga_per_malam,
            'fasilitas'         => $request->fasilitas,
            'deskripsi'         => $request->deskripsi,
            'gambar'            => $gambar

        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $tipeKamar = TipeKamar::findOrFail($id);

        $tipeKamar->update([
            'nama_tipe'         => $request->nama_tipe,
            'harga_per_malam'   => $request->harga_per_malam,
            'fasilitas'         => $request->fasilitas,
            'deskripsi'         => $request->deskripsi,
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