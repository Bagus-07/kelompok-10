<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoKamar extends Model
{
    public function tipeKamar()
    {
        return $this->belongsTo(TipeKamar::class);
    }
}
