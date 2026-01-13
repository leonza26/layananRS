<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    //

     use HasFactory;

    protected $fillable = [
        'appointment_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'snap_token',
    ];
    // Relasi balik ke Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
