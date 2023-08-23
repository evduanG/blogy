<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\posts\PostModele;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function updateProfile(Request $request, $id)
    {
        if (Auth::user()->id == $id) {

            Request()->validate([
                'name' => 'required|max:30',
                'email' => 'required|max:30',
                'bio' => 'required|max:30',
            ]);
            $updateProfileData = $request->except('_token', '_method', 'submit'); // Exclude the _token field

            $updateProfile = User::where('id', $id)->update($updateProfileData);

            if ($updateProfile) {
                return redirect('/posts/index')->with('update', 'Profile Update Successfully');
            }
        }
        return abort('404');
    }


    public function editProfile($id)
    {
        if (Auth::user()->id != $id) {
            return abort('404');
        }
        $user = User::find($id);

        return view('user.update-profile', compact('user'));
    }

    public function profile($id)
    {
        $profile = User::find($id);
        $laststPosts = PostModele::where('user_id', $profile->id)->take(4)->orderBy('created_at', 'desc')->get();
        // categories
        $categories = DB::table('categories as c')
            ->join('posts as p', 'p.category', '=', 'c.name')
            ->where('p.user_id', $id)
            ->groupBy('c.name')
            ->selectRaw('COUNT(*) as total, c.name as name')
            ->orderBy('total', 'desc')
            ->get();

        return view('user.profile', compact('profile', 'laststPosts', 'categories'));
    }
}
