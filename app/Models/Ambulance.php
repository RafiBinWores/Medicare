<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'image',
        'city',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
