<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\PostModele;

class PostController extends Controller
{
    public function index()
    {
        // first section
        $posts = PostModele::all()->take(2);
        $postOne = PostModele::take(1)->orderBy('id', 'desc')->get();
        $postTwo = PostModele::take(2)->orderBy('title', 'desc')->get();


        //  business section
        $postsBus = PostModele::where('category', 'business')->take(2)->get();
        $postsBusList = PostModele::where('category', 'business')->take(3)->orderBy('title', 'desc')->get();


        //  Rendom post section
        $rendomPosts = PostModele::take(4)->orderBy('category', 'desc')->get();

        //  culture section
        $postsCulture = PostModele::where('category', 'culture')->take(2)->get();
        $postsCultureList = PostModele::where('category', 'culture')->take(3)->orderBy('title', 'desc')->get();

        //  politics section
        $postsPolitics = PostModele::where('category', 'politics')->take(9)->get();

        // Travel section
        $postsTravelOne =  PostModele::where('category', 'travel')->take(1)->orderBy('created_at', 'desc')->get();
        $postsTravelBig =  PostModele::where('category', 'travel')->take(1)->get();
        $postsTravelTwo = PostModele::where('category', 'travel')->take(2)->orderBy('title', 'desc')->get();


        return view('posts.index', compact(
            'posts',
            'postOne',
            'postTwo',
            'postsBus',
            'postsBusList',
            'rendomPosts',
            'postsCulture',
            'postsCultureList',
            'postsPolitics',
            'postsTravelOne',
            'postsTravelOne',
            'postsTravelBig',
            'postsTravelTwo'
        ));
    }



    public function single($id)
    {
    }
}
