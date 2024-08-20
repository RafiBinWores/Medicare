<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Get profile page
    public function profile()
    {
        $user = Auth::user();

        return view('frontend.account.profile', compact('user'));
    }

    // Get edit profile page
    public function editProfile()
    {
        $user = Auth::user();
        $cities = City::orderBy('name', 'ASC')->get();

        return view('frontend.account.edit-profile', compact('user', 'cities'));
    }

    // Update user data
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'blood_group' => 'required',
            'blood_donor' => 'required|in:yes,no',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5048',
        ]);

        if ($validator->passes()) {

            $oldImage = $user->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('profile')->put($fileName, file_get_contents($file->getRealPath()));

                // Delete old image
                if (!empty($oldImage)) {
                    Storage::disk('profile')->delete($oldImage);
                }
            } else {
                $fileName = $oldImage;
            }

            $user->name = trim($request->name);
            $user->phone = $request->full_phone;
            $user->date_of_birth = $request->dob;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            $user->blood_donor = $request->blood_donor;
            $user->image = $fileName;
            $user->city_id = $request->city;
            $user->save();

            session()->flash('success', 'User info updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'User info updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // get change password page
    public function changePassword()
    {
        $user = Auth::user();
        return view('frontend.account.change-password', compact('user'));
    }

    // Update password
    public function updatePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        if (Hash::check($request->old_password, Auth::user()->password) == false) {
            session()->flash('error', 'Your old password in incorrect.');
            return response()->json([
                'status' => true,
            ]);
        }

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        session()->flash('success', 'Password updated successfully.');
        return response()->json([
            'status' => true,
        ]);
    }
}
