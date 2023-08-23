<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\posts\PostModele;
use App\Models\posts\Category;
use App\Models\Admin\Admin;

class AdminController extends Controller
{

    public function viewLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admins.dashboard');
        }
        return view('admin.login-admin');
    }

    public function checkLogin(Request $request)
    {
        Request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        $countPost = PostModele::count();
        $countCategory = Category::count();
        $countAdmin = Admin::count();

        $count = [
            'Posts' => $countPost,
            'Categories' => $countCategory,
            'Admins' => $countAdmin
        ];
        return view('admin.index', compact('count'));
    }

    public function showAdmins()
    {
        $admins = Admin::select('id', 'name', 'email')->get();
        return view('admin.show-admins',  compact('admins'));
    }
}
