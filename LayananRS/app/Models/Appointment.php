<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'schedule_id',
        'appointment_time',
        'complaint',
        'status',
    ];

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

    // Relasi balik ke Schedule
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    // Relasi One-to-One ke Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Relasi One-to-One ke Review
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
