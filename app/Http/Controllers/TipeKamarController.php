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
        $request->validate(
            [
                'nama_tipe' => 'required|string|max:100',
                'harga_per_malam' => 'required|numeric|min:1',
                'fasilitas' => 'required|string',
                'deskripsi' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_tipe.required' => 'Nama tipe kamar wajib diisi.',
                'harga_per_malam.required' => 'Harga per malam wajib diisi.',
                'harga_per_malam.numeric' => 'Harga per malam harus berupa angka.',
                'harga_per_malam.min' => 'Harga harus lebih dari 0.',
                'fasilitas.required' => 'Fasilitas wajib diisi.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'gambar.image' => 'File harus berupa gambar.',
                'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, atau PNG.',
                'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
            ]
        );

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request
                ->file('gambar')
                ->store('tipe-kamar', 'public');
        }

        TipeKamar::create([
            'nama_tipe'       => $request->nama_tipe,
            'harga_per_malam' => $request->harga_per_malam,
            'fasilitas'       => $request->fasilitas,
            'deskripsi'       => $request->deskripsi,
            'gambar'          => $gambar,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Tipe kamar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_tipe' => 'required|string|max:100',
                'harga_per_malam' => 'required|numeric|min:1',
                'fasilitas' => 'required|string',
                'deskripsi' => 'required|string',
            ],
            [
                'nama_tipe.required' => 'Nama tipe kamar wajib diisi.',
                'harga_per_malam.required' => 'Harga per malam wajib diisi.',
                'harga_per_malam.numeric' => 'Harga harus berupa angka.',
                'harga_per_malam.min' => 'Harga harus lebih dari 0.',
                'fasilitas.required' => 'Fasilitas wajib diisi.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
            ]
        );

        $tipeKamar = TipeKamar::findOrFail($id);

        $tipeKamar->update([
            'nama_tipe'       => $request->nama_tipe,
            'harga_per_malam' => $request->harga_per_malam,
            'fasilitas'       => $request->fasilitas,
            'deskripsi'       => $request->deskripsi,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Tipe kamar berhasil diupdate.');
    }

    public function destroy($id)
    {
        TipeKamar::findOrFail($id)->delete();

        return redirect()->back();
    }

}