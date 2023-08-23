<?php

namespace App\Http\Controllers\categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\posts\PostModele;
use App\Models\posts\Comment;
use App\Models\posts\Category;


class CategoryController extends Controller
{
    //

    public function category($name)
    {
        $posts = PostModele::where('category', $name)
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('categories.category', compact('posts', 'name'));
    }
}
