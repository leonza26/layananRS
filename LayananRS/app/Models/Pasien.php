<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'phone_number',
        'address',
    ];

    // Relasi balik ke User
    public function user()
    {
        return $this->belongsTo(User::class);
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
