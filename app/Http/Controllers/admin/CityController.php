<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CityController extends Controller
{
    // Get city list page
    public function index(Request $request)
    {
        $cities = City::latest('id');

        if (!empty($request->get('keyword'))) {
            $cities = $cities->where('name', 'like', '%' . $request->keyword . '%');
        }

        $cities = $cities->paginate(10);
        return view('admin.cities.view', compact('cities'));
    }

    // Get city create page
    public function create()
    {
        return view('admin.cities.create');
    }

    // Store city data 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cities,name',
        ]);

        if ($validator->passes()) {

            $city = new City();
            $city->name = trim($request->name);
            $city->slug = Str::slug($request->get('name'), '-');
            $city->save();

            session()->flash('success', 'City added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'City added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get city edit page
    public function edit($id, Request $request)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }

    // Responsible for updating city data
    public function update($id, Request $request)
    {
        $city = City::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cities,name,' . $city->id . ',id',
        ]);

        if ($validator->passes()) {

            $city->name = trim($request->name);
            $city->slug = Str::slug($request->get('name'), '-');
            $city->save();

            session()->flash('success', 'City updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'City updated successfully.'
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
        $city = City::find($id);

        $city->delete();
        return response()->json([
            'status' => true,
            'message' => 'City deleted successfully.'
        ]);
    }
}
