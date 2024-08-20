<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class UserSpecializationController extends Controller
{

    // Get & search all specializations data from DB
    public function index(Request $request)
    {
        $query = Specialization::where('status', 1);

        if (!empty($request->get('keyword'))) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $specializations = $query->orderBy('name', 'ASC')->get();
        return view('frontend.specializations', compact('specializations'));
    }

    // Get specialized doctor page
    public function specializedDoctor($slug, Request $request)
    {
        $specialization = Specialization::where('slug', $slug)->firstOrFail();

        // Start building the query for doctors
        $query = Doctor::with('specialization')->whereHas('specialization', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });

        // Apply search filter if provided
        if (!empty($request->get('search'))) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)->orWhere('city', 'like', $searchTerm);
            });
        }

        // Get the final list of doctors after applying all filters
        $doctors = $query->get();

        return view('frontend.specialized-doctor', compact('specialization', 'doctors'));
    }
}
