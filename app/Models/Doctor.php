<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'about',
        'education',
        'clinic_name',
        'clinic_address',
        'experience',
        'specialization_id',
        'availability',
        'city',
    ];

    protected $casts = [
        'services' => 'array',
    ];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function educations()
    {
        return $this->belongsToMany(Education::class, 'doctor_education');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}
