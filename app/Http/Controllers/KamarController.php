<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{

    public function store(Request $request)
    {
        $request->validate(
            [
                'tipe_kamar_id' => 'required|exists:tipe_kamars,id',
                'nomor_kamar'   => 'required|string|max:20|unique:kamars,nomor_kamar',
                'status'        => 'required|in:Tersedia,Dipakai,Cleaning,Maintenance',
            ],
            [
                'tipe_kamar_id.required' => 'Tipe kamar wajib dipilih.',
                'tipe_kamar_id.exists'   => 'Tipe kamar tidak ditemukan.',

                'nomor_kamar.required' => 'Nomor kamar wajib diisi.',
                'nomor_kamar.unique'   => 'Nomor kamar sudah digunakan.',
                'nomor_kamar.max'      => 'Nomor kamar maksimal 20 karakter.',

                'status.required' => 'Status kamar wajib dipilih.',
                'status.in'       => 'Status kamar tidak valid.',
            ]
        );

        Kamar::create([
            'tipe_kamar_id' => $request->tipe_kamar_id,
            'nomor_kamar'   => $request->nomor_kamar,
            'status'        => $request->status
        ]);

        return redirect()->back()
            ->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
        [
            'tipe_kamar_id' => 'required|exists:tipe_kamars,id',
            'nomor_kamar' => 'required|string|max:20|unique:kamars,nomor_kamar,' . $id,
            'status' => 'required|in:Tersedia,Dipakai,Cleaning,Maintenance',
        ],
        [
            'tipe_kamar_id.required' => 'Tipe kamar wajib dipilih.',
            'tipe_kamar_id.exists' => 'Tipe kamar tidak ditemukan.',

            'nomor_kamar.required' => 'Nomor kamar wajib diisi.',
            'nomor_kamar.unique' => 'Nomor kamar sudah digunakan.',
            'nomor_kamar.max' => 'Nomor kamar maksimal 20 karakter.',

            'status.required' => 'Status kamar wajib dipilih.',
            'status.in' => 'Status kamar tidak valid.',
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

    public function selesaiCleaning($id)
    {
        $kamar = Kamar::findOrFail($id);

        if ($kamar->status != 'Cleaning') {
            return redirect()->back()
                ->with('error', 'Kamar tidak sedang dalam proses cleaning.');
        }

        $kamar->update([
            'status' => 'Tersedia'
        ]);

        return redirect()->back()
            ->with('success', 'Cleaning selesai. Kamar siap digunakan.');
    }

    public function destroy($id)
    {
        Kamar::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Kamar berhasil dihapus');
    }
}