<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    // Get doctor view page
    public function doctors(Request $request)
    {
        $specializationArr = [];
        $query = Doctor::with('specialization')->where('is_approved', 1);

        if (!empty($request->get('search'))) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($query) use ($searchTerm, $request) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('city', 'like', $searchTerm)
                    ->orWhereHas('specialization', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', $searchTerm);
                    });
            });
        }

        // Filter doctors by specializations
        if (!empty($request->get('specialization'))) {
            $specializationArr = explode(',', $request->get('specialization'));
            $query->whereIn('specialization_id', $specializationArr);
        }

        $doctors = $query->orderBy('name', 'ASC')->get();
        $specializations = Specialization::orderBy('name', 'ASC')->where('status', 1)->get();

        return view('frontend.doctor.doctors', compact('doctors', 'specializations', 'specializationArr'));
    }

    // Get doctor form page
    public function doctorForm()
    {
        $cities = City::orderBy('name', 'ASC')->get();
        $specializations = Specialization::orderBy('name', 'ASC')->get();
        $services = Service::orderBy('name', 'ASC')->get();
        $educations = Education::orderBy('name', 'ASC')->get();

        return view('frontend.doctor.doctor-form', compact('cities', 'specializations', 'services', 'educations'));
    }

    // Store doctor data from apply form
    public function doctorFormStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'about' => 'required',
            'phone' => 'required',
            'clinic_name' => 'required',
            'clinic_address' => 'required',
            'experience' => 'required',
            'services' => 'required|array',
            'specialization' => 'required',
            'availability' => 'required',
            'city' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'educations' => 'required|array',
            'educations.*' => 'required|exists:education,id',
        ]);

        if ($validator->passes()) {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('doctor')->put($fileName, file_get_contents($file->getRealPath()));
            }

            $slug = Str::slug(str_replace('.', '', $request->get('name')), '-');

            $doctor = new Doctor();
            $doctor->name = trim($request->name);
            $doctor->slug = $slug;
            $doctor->about = $request->about;
            $doctor->phone = $request->full_phone;
            $doctor->clinic_name = $request->clinic_name;
            $doctor->clinic_address = $request->clinic_address;
            $doctor->experience = $request->experience;
            $doctor->services = json_encode($request->services);
            $doctor->availability = $request->availability;
            $doctor->city = $request->city;
            $doctor->image = $fileName;
            $doctor->user_id = Auth::user()->id;
            $doctor->specialization_id = $request->specialization;
            $doctor->save();

            // Save educations in pivot table
            $doctor->educations()->sync($request->educations);

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

    // Get doctor details page
    public function doctorDetails($slug)
    {
        $doctor = Doctor::with('educations')->where('slug', $slug)->first();
        $services = [];

        if (!empty($doctor->services)) {
            $serviceIds = json_decode($doctor->services);
            $services = Service::whereIn('id', $serviceIds)->get();
        }

        return view('frontend.doctor.doctor-details', compact('doctor', 'services'));
    }
}
