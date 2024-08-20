<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class BloodDonorController extends Controller
{
    public function bloodDonors(Request $request)
    {
        $cityArr = [];
        $cities = City::orderBy('name', 'ASC')->get();
        $bloodDonors = User::where('blood_donor', 'yes');

        if (!empty($request->get('search'))) {
            $bloodDonors->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter ambulance by city
        if (!empty($request->get('city'))) {
            $cityArr = explode(',', $request->get('city'));
            $bloodDonors->whereIn('city_id', $cityArr);
        }
        $bloodDonors = $bloodDonors->paginate(16);
        return view('frontend.blood-donors', compact('cities', 'cityArr', 'bloodDonors'));
    }
}
