<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [
    'user_id',
    'name',
    'review',
    'rating',
    'tipe_kamar_id'
];

public function tipeKamar()
{
    return $this->belongsTo(TipeKamar::class);
}
}