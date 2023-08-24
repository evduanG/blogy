<?php

namespace App\Http\Controllers\Admin;

use DB;

use App\Http\Controllers\Controller;

use App\Models\posts\PostModele;
use App\Models\posts\Category;
use App\Models\Admin\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

    // Admins
    public function showAdmins()
    {
        $admins = Admin::select('id', 'name', 'email')->get();
        return view('admin.show-admins',  compact('admins'));
    }

    public function createAdmins()
    {
        return view('admin.create-admins');
    }

    public function storeAdmins(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Request()->validate([
                'name' => 'required|max:60',
                'email' => 'required|max:60',
                'password' => 'required|max:70',
            ]);

            $insertAdmin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/admin/show-admins')->with('success', 'Create New Admin Successfully');
        }
        return abort(404);
    }


    //  categories
    public function showCategories()
    {
        $categories = DB::table('categories as c')
            ->leftJoin('posts as p', 'p.category', '=', 'c.name')
            ->groupBy('c.name')
            ->selectRaw('c.id as id, c.name as name, COUNT(p.id) as total') // Using COUNT(p.id) to count only posts that exist
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.show-categories',  compact('categories'));
    }

    public function createUpdateCategories($id)
    {
        $category = Category::find($id);

        return view('admin.update-category',  compact('category'));
    }

    public function storeUpdateCategories(Request $request, $id)
    {
        Request()->validate([
            'name' => 'required|max:60',
        ]);

        // Temporarily disable timestamps for the update operation
        $res = Category::withoutTimestamps(function () use ($id, $request) {
            return Category::where('id', $id)->update(['name' => $request->name]);
        });
        if ($res) {
            return redirect('/admin/show-categories')->with('success', 'Update Category Successfully');
        }
        return abort('404');
    }
    public function createNewCategories()
    {
        return view('admin.create-category');
    }

    public function storeNewCategories(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:60',
        ]);
        $res = Category::withoutTimestamps(function () use ($request) {
            return Category::create(['name' => $request->name]);
        });
        if ($res) {
            return redirect('/admin/show-categories')->with('success', 'Update Category Successfully');
        }
        return abort('404');
    }

    public function deleteCategory($id)
    {
        $id = Category::where('id', $id)->delete();
        echo $id;
        // $category = Category::find($id);
        // $category->delete();
        return redirect('/admin/show-categories')->with('delete', 'Update Delete Successfully');
    }

    public function storeCategories(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Request()->validate([
                'name' => 'required|max:60',
                'email' => 'required|max:60',
                'password' => 'required|max:70',
            ]);

            $insertAdmin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/admin/show-admins')->with('success', 'Create New Admin Successfully');
        }
        return abort(404);
    }
}
