<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar_id' => 'required|exists:tipe_kamars,id',
            'nomor_kamar'   => 'required|unique:kamars,nomor_kamar',
            'status'        => 'required'
        ]);

        Kamar::create([
            'tipe_kamar_id' => $request->tipe_kamar_id,
            'nomor_kamar'   => $request->nomor_kamar,
            'status'        => $request->status
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_kamar'   => 'required',
            'status'        => 'required'
        ]);

        $kamar = Kamar::findOrFail($id);

        $kamar->update([
            'tipe_kamar_id' => $request->tipe_kamar_id,
            'nomor_kamar'   => $request->nomor_kamar,
            'status'        => $request->status
        ]);

        return redirect()->back()
            ->with('success', 'Kamar berhasil diupdate');
    }
}