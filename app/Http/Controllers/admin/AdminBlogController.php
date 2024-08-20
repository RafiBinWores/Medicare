<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    // Get Specialization list page
    public function index(Request $request)
    {
        $blogs = Blog::latest('id');

        if (!empty($request->get('keyword'))) {
            $blogs = $blogs->where('name', 'like', '%' . $request->keyword . '%');
        }

        $blogs = $blogs->paginate(10);
        return view('admin.blogs.view', compact('blogs'));
    }

    // Get Specialization create page
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Store brand 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title',
            'content' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'blogStatus' => 'required',
        ]);

        if ($validator->passes()) {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('blog')->put($fileName, file_get_contents($file->getRealPath()));
            }

            $blog = new Blog();
            $blog->title = trim($request->title);
            $blog->slug = Str::slug($request->get('title'), '-');
            $blog->content = $request->content;
            $blog->status = $request->blogStatus;
            $blog->image = $fileName;
            $blog->save();

            session()->flash('success', 'Blog added successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Blog added successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Get blog edit page
    public function edit($id, Request $request)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    // Responsible for updating specialization
    public function update($id, Request $request)
    {
        $blog = Blog::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
            'blogStatus' => 'required',
        ]);

        if ($validator->passes()) {

            $oldImage = $blog->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('blog')->put($fileName, file_get_contents($file->getRealPath()));

                // Delete old image
                if (!empty($oldImage)) {
                    Storage::disk('blog')->delete($oldImage);
                }
            } else {
                $fileName = $oldImage;
            }

            $blog->title = trim($request->title);
            $blog->slug = Str::slug($request->get('title'), '-');
            $blog->content = $request->content;
            $blog->status = $request->blogStatus;
            $blog->image = $fileName;
            $blog->save();

            session()->flash('success', 'Blog updated successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Blog updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete blog 
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!empty($blog->image)) {
            Storage::disk('blog')->delete($blog->image);
        }

        $blog->delete();
        return response()->json([
            'status' => true,
            'message' => 'Specialization deleted successfully.'
        ]);
    }
}
