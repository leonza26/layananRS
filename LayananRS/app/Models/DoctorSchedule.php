<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'date',
        'start_time',
        'end_time',
        'is_active',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
