<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ambulance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAmbulanceController extends Controller
{
    // Get ambulance list page
    public function index()
    {
        $ambulances = Ambulance::where('is_approved', '1')->paginate(10);

        return view('admin.ambulances.ambulance-list', compact('ambulances'));
    }

    // Get ambulance add page
    public function pending()
    {
        $ambulances = Ambulance::where('is_approved', '0')->paginate(10);

        return view('admin.ambulances.pending', compact('ambulances'));
    }

    // approve ambulance data
    public function approve($id)
    {
        try {
            $ambulance = Ambulance::findOrFail($id);
            $userId = $ambulance->user_id;

            // Update the ambulance's approval status
            $ambulance->is_approved = 1;
            $ambulance->save();

            // Update the user's role to 'ambulance'
            $user = User::findOrFail($userId);
            $user->role = 'ambulance';
            $user->save();

            session()->flash('success', 'Application approved.');
            return response()->json([
                'status' => true,
                'message' => 'Application approved.'
            ]);

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

    // Get ambulance edit page
    public function edit()
    {
        return view('admin.ambulance.edit');
    }

    // Update ambulance data
    public function update()
    {
    }

    // Delete ambulance data
    public function destroy($id)
    {
        $ambulance = Ambulance::find($id);

        $userId = $ambulance->user_id;

        $user = User::findOrFail($userId);
        $user->role = 'user';
        $user->save();

        if (!empty($ambulance->image)) {
            Storage::disk('ambulance')->delete($ambulance->image);
        }

        $ambulance->delete();
        return response()->json([
            'status' => true,
            'message' => 'Ambulance deleted successfully.'
        ]);
    }
}
