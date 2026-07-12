<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'created_by',

        'kamar_id',
        'kamar',
        'tanggal',

        'room_name',
        'check_in',
        'check_out',

        'total_price',
        'payment_method',
        'payment_proof',
        'status',
        'booking_source'
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function statusLabel()
    {
        return match($this->status){

            'pending' =>
                'Tertunda',

            'waiting_verification' =>
                'Menunggu Verifikasi',

            'confirmed' =>
                'Dikonfirmasi',

            'completed' =>
                'Selesai',

            'rejected' =>
                'Ditolak',
            
            'cancelled' =>
                'dibatalkan',

            default =>
                ucfirst($this->status)

        };
    }


    public function statusClass()
    {
        return match($this->status){

            'confirmed',
            'completed' =>
                'sukses',

            'waiting_verification',
            'pending' =>
                'Tertunda',

            'rejected' =>
                'Bahaya',

            'cancelled' =>
                'dibatalkan',

            default =>
                ''

        };
    }
}
