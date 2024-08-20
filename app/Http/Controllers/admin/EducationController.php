<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    // Get city list page
    public function index(Request $request)
    {
        $educations = Education::latest('id');

        if (!empty($request->get('keyword'))) {
            $educations = $educations->where('name', 'like', '%' . $request->keyword . '%');
        }

        $educations = $educations->paginate(10);
        return view('admin.educations.view', compact('educations'));
    }

    // Get city create page
    public function create()
    {
        return view('admin.educations.create');
    }

    // Store city data 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:education,name',
            'abbreviation' => 'required|unique:education,abbreviation',
            'activeStatus' => 'required',
        ]);

        if ($validator->passes()) {

            $education = new Education();
            $education->name = trim($request->name);
            $education->abbreviation = trim($request->abbreviation);
            $education->status = $request->activeStatus;
            $education->save();

            session()->flash('success', 'Education added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Education added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get Education edit page
    public function edit($id, Request $request)
    {
        $education = Education::findOrFail($id);
        return view('admin.educations.edit', compact('education'));
    }

    // Responsible for updating Education data
    public function update($id, Request $request)
    {
        $education = Education::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:education,name,' . $education->id . ',id',
            'abbreviation' => 'required|unique:education,abbreviation,' . $education->id . ',id',
            'activeStatus' => 'required',
        ]);

        if ($validator->passes()) {

            $education->name = trim($request->name);
            $education->abbreviation = trim($request->abbreviation);
            $education->status = $request->activeStatus;
            $education->save();

            session()->flash('success', 'Education updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Education updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete brand 
    public function destroy($id)
    {
        $education = Education::find($id);

        $education->delete();
        return response()->json([
            'status' => true,
            'message' => 'Education deleted successfully.'
        ]);
    }
}
