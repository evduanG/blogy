<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function updateProfile(Request $request, $id)
    {
        if (Auth::user()->id == $id) {
            $updateProfileData = $request->except('_token', '_method', 'submit'); // Exclude the _token field

            $updateProfile = User::where('id', $id)->update($updateProfileData);

            if ($updateProfile) {
                return redirect('/posts/index')->with('update', 'Profile Update Successfully');
            }
        }
        return abort('404');
    }

    // public function updatePrifile(Request $request, $id)
    // {

    //     if (Auth::user()->id == $id) {
    //         $updatePrifile = User::where('id', $id)->update(
    //             $request->all());

    //         if ($updatePrifile) {
    //             return redirect('/users/update/' . $updatePrifile->id . '')->with('update', 'Profile Update Successfully');
    //         }
    //     }
    //     return abort('404');
    // }

    public function editPrifile($id)
    {
        $user = User::find($id);

        return view('user.update-prifile', compact('user'));
    }
}
