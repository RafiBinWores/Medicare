<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorEducation extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'education_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
