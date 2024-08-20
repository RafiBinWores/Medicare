<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SpecializationController extends Controller
{
    // Get Specialization list page
    public function index(Request $request)
    {
        $specializations = Specialization::latest('id');

        if (!empty($request->get('keyword'))) {
            $specializations = $specializations->where('name', 'like', '%' . $request->keyword . '%');
        }

        $specializations = $specializations->paginate(10);
        return view('admin.specializations.view', compact('specializations'));
    }

    // Get Specialization create page
    public function create()
    {
        return view('admin.specializations.create');
    }

    // Store brand 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:specializations,name',
            'specializationStatus' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($validator->passes()) {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('specialization')->put($fileName, file_get_contents($file->getRealPath()));
            }

            $specialization = new Specialization();
            $specialization->name = trim($request->name);
            $specialization->slug = Str::slug($request->get('name'), '-');
            $specialization->status = $request->specializationStatus;
            $specialization->image = $fileName;
            $specialization->save();

            session()->flash('success', 'Specialization added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Specialization added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get specialization edit page
    public function edit($id, Request $request)
    {
        $specialization = Specialization::findOrFail($id);
        return view('admin.specializations.edit', compact('specialization'));
    }

    // Responsible for updating specialization
    public function update($id, Request $request)
    {
        $specialization = Specialization::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:specializations,name,' . $specialization->id . ',id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5048',
            'status' => 'required',
        ]);

        if ($validator->passes()) {

            $oldImage = $specialization->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('specialization')->put($fileName, file_get_contents($file->getRealPath()));

                // Delete old image
                if (!empty($oldImage)) {
                    Storage::disk('specialization')->delete($oldImage);
                }
            } else {
                $fileName = $oldImage;
            }

            $specialization->name = trim($request->name);
            $specialization->slug = Str::slug($request->get('name'), '-');
            $specialization->status = $request->status;
            $specialization->image = $fileName;
            $specialization->save();

            session()->flash('success', 'Specialization updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Specialization updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete Specialization 
    public function destroy($id)
    {
        $specialization = Specialization::find($id);

        if (!empty($specialization->image)) {
            Storage::disk('specialization')->delete($specialization->image);
        }

        $specialization->delete();
        return response()->json([
            'status' => true,
            'message' => 'Specialization deleted successfully.'
        ]);
    }
}
