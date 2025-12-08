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

}
