<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Get login page
    public function index()
    {
        return view('admin.login');
    }

    // Authenticate Admin
    public function authenticate(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                $admin = Auth::guard('admin')->user();

                if ($admin->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    $admin = Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not authorized.');
                }
            } else {
                return redirect()->route('admin.login')->with('error', 'Invalid email or password!');
            }
        } else {

            return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }

    //Logout Admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
