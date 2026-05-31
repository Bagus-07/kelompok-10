<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    protected $fillable = [

        'nama_tipe',
        'harga_per_malam',
        'fasilitas',
        'deskripsi'

    ];
}