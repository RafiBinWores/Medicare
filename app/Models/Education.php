<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'status',
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_education');
    }
}
