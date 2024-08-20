<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Get registration page
    public function registration()
    {
        return view('frontend.account.registration');
    }

    // For register new user
    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Email/Phone number already taken.');
            return response()->json([
                'status' => false,
                'message' => 'Email/Phone number already taken.',
            ]);
        }

        if ($validator->passes()) {

            $user = new User();
            $user->phone = $request->full_phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            // Log in the user
            Auth::login($user);

            session()->flash('success', 'User registration successful.');
            return response()->json([
                'status' => true,
                'message' => 'User registration successful.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get login page
    public function login()
    {
        return view('frontend.account.login');
    }

    // For logged in user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect()->route('frontend.home');
            } else {
                return redirect()->route('account.login')->with('error', 'Email or password is incorrect.');
            }
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');
    }
}
