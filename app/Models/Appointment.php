<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'name',
        'email',
        'phone',
        'age',
        'gender',
        'note',
        'appointment_date',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
