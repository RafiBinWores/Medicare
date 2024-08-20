<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDoctorController extends Controller
{
    // Get doctor list page
    public function index()
    {
        $doctors = Doctor::where('is_approved', '1')->paginate(10);

        return view('admin.doctors.doctor-list', compact('doctors'));
    }

    // Get doctor add page
    public function pending()
    {
        $doctors = Doctor::where('is_approved', 0)->paginate(10);

        return view('admin.doctors.pending', compact('doctors'));
    }

    // approve doctor data
    public function approve($id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $userId = $doctor->user_id;

            // Update the doctor's approval status
            $doctor->is_approved = 1;
            $doctor->save();

            // Update the user's role to 'doctor'
            $user = User::findOrFail($userId);
            $user->role = 'doctor';
            $user->save();

            session()->flash('success', 'Application approved.');
            return response()->json([
                'status' => true,
                'message' => 'Application approved.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'errors' => 'Could not approve the application.',
            ]);
        }
    }

    // Get doctor edit page
    public function edit()
    {
        return view('admin.doctor.edit');
    }

    // Update ambulance data
    public function update()
    {
    }

    // Delete ambulance data
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $userId = $doctor->user_id;

        $user = User::findOrFail($userId);
        $user->role = 'user';
        $user->save();

        if (!empty($doctor->image)) {
            Storage::disk('doctor')->delete($doctor->image);
        }

        $doctor->delete();
        return response()->json([
            'status' => true,
            'message' => 'Doctor deleted successfully.'
        ]);
    }
}
