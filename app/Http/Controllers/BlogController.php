<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //


public function store(Request $request)
{
    $request->validate([
        'blog_title' => 'required|string|max:255',
        'blog_cat' => 'required|string',
        'blog_description' => 'required|string',
        'blog_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png',
        'blog_Favimg.*' => 'nullable|image|mimes:jpg,jpeg,png',
        'blog_location' => 'required|string',
        'blog_content' => 'required|string',
    ]);

    // Upload thumbnail
    $thumbnailName = null;
    if ($request->hasFile('blog_thumbnail')) {
        $thumbnailName = time().'_'.$request->blog_thumbnail->getClientOriginalName();
        $request->blog_thumbnail->move(public_path('uploads/thumbnails'), $thumbnailName);
    }

    // Upload multiple images
    $favImages = [];
    if ($request->hasFile('blog_Favimg')) {
        foreach ($request->file('blog_Favimg') as $image) {
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/fav_images'), $imageName);
            $favImages[] = $imageName;
        }
    }

    // Save in database
    Blog::create([
        'blog_title' => $request->blog_title,
        'blog_cat' => $request->blog_cat,
        'blog_description' => $request->blog_description,
        'blog_thumbnail' => $thumbnailName,
        'blog_favimg' => json_encode($favImages), // store as JSON
        'blog_location' => $request->blog_location,
        'blog_content' => $request->blog_content,
    ]);

    return back()->with('success', 'Blog Published Successfully!');
}


}
