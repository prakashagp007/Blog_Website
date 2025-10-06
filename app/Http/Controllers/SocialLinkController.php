<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    // public function index()
    // {
    //     $links = SocialLink::all();
    //     return view('social_links.index', compact('links'));
    // }

    // public function create()
    // {
    //     return view('social_links.create');
    // }

public function store(Request $request)
{
    $request->validate([
        'platform_name' => 'required|string|max:255',
        'icon_class' => 'required|string|max:255',
        'url' => 'required|url',
    ]);

    SocialLink::create($request->only(['platform_name', 'icon_class', 'url']));

    // Redirect to the dashboard route
    return redirect()->back()->with('success', 'Social Icon Added!');
}


    // public function edit(SocialLink $socialLink)
    // {
    //     return view('social_links.edit', compact('socialLink'));
    // }

    // public function update(Request $request, SocialLink $socialLink)
    // {
    //     $request->validate([
    //         'platform_name' => 'required|string|max:255',
    //         'icon_class' => 'required|string|max:255',
    //         'url' => 'required|url',
    //     ]);

    //     $socialLink->update($request->all());
    //     return redirect()->route('social_links.index')->with('success', 'Updated successfully.');
    // }

    // public function destroy(SocialLink $socialLink)
    // {
    //     $socialLink->delete();
    //     return redirect()->route('social_links.index')->with('success', 'Deleted successfully.');
    // }
}

