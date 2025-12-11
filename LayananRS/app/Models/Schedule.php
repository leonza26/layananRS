<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    // Relasi balik ke Doctor
    public function doctor()
    {
        return $this->belongsTo(Dokter::class);
    }

    // Relasi One-to-One ke Appointment
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
