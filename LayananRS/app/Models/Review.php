<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'patient_id',
        'doctor_id',
        'rating',
        'comment',
    ];

    // Relasi balik ke Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Relasi balik ke Patient
    public function patient()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi balik ke Doctor
    public function doctor()
    {
        return $this->belongsTo(Dokter::class);
    }
}
