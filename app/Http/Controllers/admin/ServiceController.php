<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Get service list page
    public function index(Request $request)
    {
        $services = Service::latest('id');

        if (!empty($request->get('keyword'))) {
            $services = $services->where('name', 'like', '%' . $request->keyword . '%');
        }

        $services = $services->paginate(10);
        return view('admin.services.view', compact('services'));
    }

    // Get Specialization create page
    public function create()
    {
        return view('admin.services.create');
    }

    // Store brand 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:services,name',
            'serviceStatus' => 'required',
        ]);

        if ($validator->passes()) {

            $service = new Service();
            $service->name = trim($request->name);
            $service->slug = Str::slug($request->get('name'), '-');
            $service->status = $request->serviceStatus;
            $service->save();

            session()->flash('success', 'Service added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Service added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get service edit page
    public function edit($id, Request $request)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // Responsible for updating specialization
    public function update($id, Request $request)
    {
        $service = Service::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:specializations,name,' . $service->id . ',id',
            'serviceStatus' => 'required',
        ]);

        if ($validator->passes()) {

            $service->name = trim($request->name);
            $service->slug = Str::slug($request->get('name'), '-');
            $service->status = $request->serviceStatus;
            $service->save();

            session()->flash('success', 'Service updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Service updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete service data 
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();
        return response()->json([
            'status' => true,
            'message' => 'Service deleted successfully.'
        ]);
    }
}
