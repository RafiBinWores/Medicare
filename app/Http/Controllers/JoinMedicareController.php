<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class JoinMedicareController extends Controller
{
    // Get join medicare page
    public function joinMedicare()
    {
        return view('frontend.join-medicare');
    }
}
