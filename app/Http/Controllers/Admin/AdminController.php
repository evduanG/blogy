<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function viewLogin()
    {
        if (isset(Auth::guard('admin')->user->name)) {
            return redirect()->route('admins.dashboard');
        }
        return view('admin.login-admin');
    }

    public function checkLogin(Request $request)
    {
        echo "checkLogin";
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        return view('admin.index');
    }
}
