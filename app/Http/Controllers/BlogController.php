<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

// BlogController.php
use App\Models\Header;
use App\Models\SocialLink;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $blogs = Blog::latest()->get();
    $headers = Header::all();
    $latestblogs = Blog::latest()->take(4)->get();
    $socialLinks = SocialLink::all();
    return view('home.home', compact('blogs', 'headers','latestblogs','socialLinks'));
}

// dashboard table for alteration

    public function table()
{
    $blogs = Blog::latest()->paginate(2);
    $headers = Header::all();
    $links = SocialLink::all();

    return view('dashboard.dashboard', compact('blogs','headers','links'));
}


    public function show($id)
    {
        $blog = Blog::findOrFail($id);  // fetch blog by ID or 404
        $headers = Header::all();
        return view('content.content', compact('blog', 'headers'));
    }

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

        // return back()->with('message', 'Successfully Logged In!');
        return back()->with('message', 'Successfully Logged In!');

    }

    /**
     * Display the specified resource.
     */
    public function view($id)
    {
        $infos = Blog::find($id);

        return view('db_includes.view', compact('infos'));
    }

    public function headerview($id){
        $headers = Header::find($id);
        return view('db_includes.header_view', compact('headers'));
    }

    public function socialview($id){
        $sociallinks = SocialLink::find($id);
        return view('db_includes.social_icons_view', compact('sociallinks'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('db_includes.edit_blog', compact('blog'));
    }

    public function headeredit($id)
    {
        $headers = Header::find($id);
        return view('db_includes.edit_header', compact('headers'));
    }

     public function socialedit($id)
    {
        $socialLink = SocialLink::find($id);
        return view('db_includes.social_icons_edit', compact('socialLink'));
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_cat' => 'required|string',
            'blog_description' => 'required|string',
            'blog_location' => 'required|string',
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

        $blog->update([
            'blog_title' => $request->blog_title,
            'blog_cat' => $request->blog_cat,
            'blog_description' => $request->blog_description,
            'blog_location' => $request->blog_location,
            'blog_content'  => $request->blog_content,
            'blog_thumbnail' => $request->blog_thumbnail ? uploadImage($request->blog_thumbnail, 'thumbnails') : $blog->blog_thumbnail,
            'blog_favimg'   => $request->blog_favimg ? uploadImage($request->blog_favimg, 'fav_img') : $blog->blog_favimg,
            'blog_favimg1'  => $request->blog_favimg1 ? uploadImage($request->blog_favimg1, 'fav_img2') : $blog->blog_favimg1,
            'blog_favimg2'  => $request->blog_favimg2 ? uploadImage($request->blog_favimg2, 'fav_img3') : $blog->blog_favimg2,
            'blog_favimg3'  => $request->blog_favimg3 ? uploadImage($request->blog_favimg3, 'fav_img4') : $blog->blog_favimg3,
        ]);

        return redirect()->route('dashboard')->with('success', 'Blog Updated Successfully!');
    }




    public function headerupdate(Request $request, $id)
{
    $request->validate([
        'menu_name' => 'required|string|max:255',
        'menu_link' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $header = Header::findOrFail($id);

    $path = $header->logo; // keep old logo if not updated
    if ($request->hasFile('logo')) {
        // Optional: delete old logo if exists
        if ($header->logo && \Storage::exists($header->logo)) {
            \Storage::delete($header->logo);
        }

        $path = $request->file('logo')->store('uploads', 'public');
    }

    $header->update([
        'logo' => $path,
        'menu_name' => $request->menu_name,
        'menu_link' => $request->menu_link,
        'button_name' => $request->button_name,
        'button_link' => $request->button_link,
    ]);

    return redirect()->route('dashboard')->with('success', 'Header Item Updated!');
}


public function socialupdate(Request $request, $id)
{
    $request->validate([
        'platform_name' => 'required|string|max:255',
        'icon_class' => 'required|string|max:255',
        'url' => 'required|url',
    ]);

    $socialLink = SocialLink::findOrFail($id);
    $socialLink->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Social link updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog=Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('dashboard')->with('success', 'Blog Deleted Successfully!');
    }

        public function headerdestroy($id)
    {
        $headers=Header::findOrFail($id);
        $headers->delete();
        return redirect()->route('dashboard')->with('success', 'Header Deleted Successfully!');
    }

        public function socialdestroy($id)
    {
        $socialLink=SocialLink::findOrFail($id);
        $socialLink->delete();
        return redirect()->route('dashboard')->with('success', 'Deleted successfully.');
    }


}
