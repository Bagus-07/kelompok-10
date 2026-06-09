<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class TipeKamar extends Model
{
    protected $fillable = [

        'nama_tipe',
        'harga_per_malam',
        'fasilitas',
        'deskripsi',
        'gambar'

    ];
    
    public function kamars()
    {
        return $this->hasMany(Kamar::class);
    }

    public function fotos()
    {
        return $this->hasMany(FotoKamar::class);
    }
}