<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_name',
        'check_in',
        'check_out',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}