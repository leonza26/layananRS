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


}
