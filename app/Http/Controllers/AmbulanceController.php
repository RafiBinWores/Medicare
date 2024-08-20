<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AmbulanceController extends Controller
{
    // Get ambulance data page
    public function ambulances(Request $request)
    {
        $cityArr = [];
        $cities = City::orderBy('name', 'ASC')->get();

        $ambulances = Ambulance::where('is_approved', 1);
        if (!empty($request->get('search'))) {
            $ambulances->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter ambulance by city
        if (!empty($request->get('city'))) {
            $cityArr = explode(',', $request->get('city'));
            $ambulances->whereIn('city_id', $cityArr);
        }

        $ambulances = $ambulances->paginate(16);
        return view('frontend.ambulance.ambulances', compact('ambulances', 'cities', 'cityArr'));
    }

    // Get ambulance form page
    public function ambulanceForm()
    {
        $cities = City::orderBy('name', 'ASC')->get();
        return view('frontend.ambulance.ambulance-form', compact('cities'));
    }

    // Store ambulance data from apply form
    public function ambulanceFormStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($validator->passes()) {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('ambulance')->put($fileName, file_get_contents($file->getRealPath()));
            }

            $ambulance = new Ambulance();
            $ambulance->name = trim($request->name);
            $ambulance->slug = Str::slug($request->get('name'), '-');;
            $ambulance->phone = $request->full_phone;
            $ambulance->address = $request->address;
            $ambulance->image = $fileName;
            $ambulance->user_id = Auth::user()->id;
            $ambulance->city_id = $request->city;
            $ambulance->save();

            session()->flash('success', 'Your form has been successfully submitted.');
            return response()->json([
                'status' => true,
                'message' => 'Your form has been successfully submitted..'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
