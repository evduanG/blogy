<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\posts\PostModele;
use App\Models\posts\Comment;
use App\Models\posts\Category;


use App\Models\User;

use DB;
use Illuminate\Support\Facades\Auth;

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
        $postsTravelOne = PostModele::where('category', 'travel')->take(1)->orderBy('created_at', 'desc')->get();
        $postsTravelBig = PostModele::where('category', 'travel')->take(1)->get();
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
        $single = PostModele::find($id);
        $user = User::find($single->user_id);
        $pupPost = PostModele::take(3)->orderBy('id', 'desc')->get();

        // categories
        $categories = DB::table('categories as c')
            ->join('posts as p', 'p.category', '=', 'c.name')
            ->where('p.user_id', $user->id)
            ->groupBy('c.name')
            ->selectRaw('COUNT(*) as total, c.name as name')
            ->orderBy('total', 'desc')
            ->get();

        //  Comment
        $comments = Comment::select('comments.id as id', 'comments.comment as comment', 'u.name as user_name', 'comments.post_id as post_id', 'comments.created_at as created_at', 'u.image as user_image')
            ->join('users AS u', 'comments.user_id', '=', 'u.id')
            ->where('comments.post_id', $id)
            ->get();


        // More post
        $moreBlog = PostModele::where('id', '!=', $id, 'AND', 'category', $single->category)->take(4)->get();

        return view('posts.single', compact('single', 'user', 'pupPost', 'categories', 'comments', 'moreBlog'));
    }

    public function storeComment(Request $request)
    {
        $insertComment = Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'post_id' => $request->post_id,
        ]);

        return redirect('/posts/single/' . $request->post_id . '')->with('success', 'Comment Inserted Successfully');
    }

    public function createPost()
    {
        if (auth()->user()) {
            $categories = Category::all();
            return view('posts/create-post', compact('categories'));
        }
        return abort('404');
    }

    public function storePost(Request $request)
    {
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $insertPost = PostModele::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'image' => $myimage
        ]);

        return redirect('/posts/create-post')->with('success', 'Comment Inserted Successfully');
    }

    public function deletePost($id)
    {
        $deletePost = PostModele::where('id', $id)->delete();

        return redirect('/posts/index')->with('deleted', 'Post Deleted Successfully');
    }

    public function editPost($id)
    {
        $single = PostModele::find($id);
        $categories = Category::all();
        if (Auth::user()->id == $single->user_id) {
            return view('posts.edit-post', compact('single', "categories"));
        } else {
            return abort('404');
        }
    }

    public function updatePost(Request $request, $id)
    {
        $updatePost = PostModele::find($id);
        if ($updatePost && Auth::user()->id == $updatePost->user_id) {
            $updatePost->update($request->all());

            if ($updatePost) {
                return redirect('/posts/single/' . $updatePost->id . '')->with('update', 'Post Update Successfully');
            }
        }
        return abort('404');
    }
    public function contact()
    {
        return view('pages.contact');
        // , compact('single', "categories"));
    }

    public function about()
    {
        return view('pages.about');
        // , compact('single', "categories"));
    }
}
