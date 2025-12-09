<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $fillable = [
        'user_id',
        'specialization',
        'biography',
        'photo_url',
        'consultaion_fee',
    ];

    // relasi balik ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi One-to-Many ke Schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    // Relasi One-to-Many ke Appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Relasi One-to-Many ke Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
