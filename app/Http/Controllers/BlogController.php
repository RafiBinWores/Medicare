<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs(Request $request)
    {
        $blogs = Blog::where('status', 1);

        if (!empty($request->get('keyword'))) {
            $blogs->where('title', 'like', '%' . $request->keyword . '%');
        }

        $blogs = $blogs->orderBy('id', 'DESC')->get();
        return view('frontend.blogs.blogs', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('frontend.blogs.blog-details', compact('blog'));
    }
}
