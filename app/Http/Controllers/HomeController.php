<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $specializations = Specialization::where('status', 1)->take(6)->get();
        $doctors = Doctor::where('is_approved', 1)->take(8)->get();
        $bloodDonors = User::where('blood_donor', 'yes')->take(8)->get();
        $ambulances = Ambulance::where('is_approved', 1)->take(8)->get();
        $blogs = Blog::where('status', 1)->take(5)->get();

        return view('frontend.home', compact('specializations', 'doctors', 'bloodDonors', 'ambulances', 'blogs'));
    }
}
