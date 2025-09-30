<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;


class HeaderController extends Controller
{
    //

    //   public function index()
    // {
    //     $headers = Header::all();
    //     return view('includes.header', compact('headers'));
    // }

    // Admin form (show add page)
    // public function create()
    // {
    //     return view('includes.header');
    // }

    // Store menu/logo in DB
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads', 'public');
            // saves inside storage/app/public/uploads
            // access => public/storage/uploads
        }

        Header::create([
            'logo' => $path,
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
        ]);

        return redirect()->back()->with('success', 'Header Item Added!');
    }


}
