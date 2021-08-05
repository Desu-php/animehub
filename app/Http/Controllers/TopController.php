<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Top;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function top()
    {
        $posts = Top::with(['post.view', 'post.categories', 'post.tv'])
            ->with(['post.anime'  => function($query){
                $query->orderBy('seria', 'DESC');
            }])
        ->orderBy('rating', 'DESC')
        ->with('post.tv')
        ->paginate(28);

        $posts = $posts->map(function ($post){
            return $post->post;
        });

        return view('page', compact('posts'))->with('title', 'Аниме');
    }
}
