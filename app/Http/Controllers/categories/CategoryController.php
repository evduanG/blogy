<?php

namespace App\Http\Controllers\categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\posts\PostModele;
use App\Models\posts\Comment;
use App\Models\posts\Category;
use DB;


class CategoryController extends Controller
{
    //

    public function category($name)
    {
        $posts = PostModele::where('category', $name)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get();
        $pupPost = PostModele::take(3)->orderBy('id', 'desc')->get();

        // categories
        $categories = DB::table('categories as c')
            ->join('posts as p', 'p.category', '=', 'c.name')
            ->groupBy('c.name')
            ->selectRaw('COUNT(*) as total, c.name as name')
            ->orderBy('total', 'desc')
            ->get();

        return view('categories.category', compact('posts', 'name', 'pupPost', 'categories'));
    }
}
