<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
     public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $uname = $request->input('username');
        $pass = $request->input('password');

        // Hardcoded check
        if ($uname === "prakash" && $pass === "1234") {
            // store session
            Session::put('authenticated', true);
            return redirect('/dashboard');
        }

        return back()->withErrors(['You do not have permission to access the Dashboard.']);
    }


    public function logout()
        {
            Session::forget('authenticated');   // ✅ remove session key
            Session::flush();                   // ✅ clear all session data
            return redirect('/login');          // back to login
        }
}
