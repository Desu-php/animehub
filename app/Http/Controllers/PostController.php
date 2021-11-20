<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        // $s = $request->do;
    }

    public function posts(Request $request, $type)
    {
        $posts = Post::post($type)
            ->latest('date');

        if ($request->has('year')) {
            $posts->year($request->year);
        }

        if ($request->has('type')){
            $posts->typeAnime($request->type);
        }

        $posts = $posts->paginate()->withQueryString();

        abort_if($posts->isEmpty(), 404);

        return view('page', compact('posts'));
    }

    public function category($type, $category)
    {
        $posts = Post::post($type)
            ->category($category)
            ->orderBy('date', 'desc')
            ->paginate(28);

        return view('page', compact('posts'));
    }


}
