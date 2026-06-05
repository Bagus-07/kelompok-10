<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TipeKamar;

class Kamar extends Model
{
    protected $fillable = [
        'tipe_kamar_id',
        'nomor_kamar',
        'status'
    ];

    public function tipeKamar()
    {
        return $this->belongsTo(TipeKamar::class);
    }
}