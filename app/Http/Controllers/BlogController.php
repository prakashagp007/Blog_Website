<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('home.home', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('blogs.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_cat' => 'required|string',
            'blog_description' => 'required|string',
            'blog_location' => 'required|string',
            'blog_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png',
            'blog_favimg' => 'nullable|image|mimes:jpg,jpeg,png',
            'blog_favimg1' => 'nullable|image|mimes:jpg,jpeg,png',
            'blog_favimg2' => 'nullable|image|mimes:jpg,jpeg,png',
            'blog_favimg3' => 'nullable|image|mimes:jpg,jpeg,png',
            'blog_content' => 'required|string',
        ]);

        // Upload helper
        function uploadImage($file, $folder)
        {
            if ($file) {
                $imageName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path("uploads/$folder"), $imageName);
                return $imageName;
            }
            return null;
        }

        $blog = Blog::create([
            'blog_title' => $request->blog_title,
            'blog_cat' => $request->blog_cat,
            'blog_description' => $request->blog_description,
            'blog_location' => $request->blog_location,
            'blog_thumbnail' => uploadImage($request->blog_thumbnail, 'thumbnails'),
            'blog_favimg'   => uploadImage($request->blog_favimg, 'fav_img'),
            'blog_favimg1'  => uploadImage($request->blog_favimg1, 'fav_img2'),
            'blog_favimg2'  => uploadImage($request->blog_favimg2, 'fav_img3'),
            'blog_favimg3'  => uploadImage($request->blog_favimg3, 'fav_img4'),
            'blog_content'  => $request->blog_content,
        ]);

        return view('dashboard.dashboard')->with('message', 'Successfully Logged In!');

    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Blog $blog)
    // {
    //     return view('blogs.edit', compact('blog'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Blog $blog)
    // {
    //     $request->validate([
    //         'blog_title' => 'required|string|max:255',
    //         'blog_cat' => 'required|string',
    //         'blog_description' => 'required|string',
    //         'blog_location' => 'required|string',
    //         'blog_content' => 'required|string',
    //     ]);

    //     // Upload helper
    //     function uploadImage($file, $folder)
    //     {
    //         if ($file) {
    //             $imageName = time().'_'.$file->getClientOriginalName();
    //             $file->move(public_path("uploads/$folder"), $imageName);
    //             return $imageName;
    //         }
    //         return null;
    //     }

    //     $blog->update([
    //         'blog_title' => $request->blog_title,
    //         'blog_cat' => $request->blog_cat,
    //         'blog_description' => $request->blog_description,
    //         'blog_location' => $request->blog_location,
    //         'blog_content'  => $request->blog_content,
    //         'blog_thumbnail' => $request->blog_thumbnail ? uploadImage($request->blog_thumbnail, 'thumbnails') : $blog->blog_thumbnail,
    //         'blog_favimg'   => $request->blog_favimg ? uploadImage($request->blog_favimg, 'fav_img') : $blog->blog_favimg,
    //         'blog_favimg1'  => $request->blog_favimg1 ? uploadImage($request->blog_favimg1, 'fav_img') : $blog->blog_favimg1,
    //         'blog_favimg2'  => $request->blog_favimg2 ? uploadImage($request->blog_favimg2, 'fav_img') : $blog->blog_favimg2,
    //         'blog_favimg3'  => $request->blog_favimg3 ? uploadImage($request->blog_favimg3, 'fav_img') : $blog->blog_favimg3,
    //     ]);

    //     return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully!');
    // }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Blog $blog)
    // {
    //     $blog->delete();
    //     return redirect()->route('blogs.index')->with('success', 'Blog Deleted Successfully!');
    // }
}
