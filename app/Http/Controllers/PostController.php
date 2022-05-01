<?php

namespace App\Http\Controllers;

use App\Models\Post\GodWip;
use App\Models\Post\Post;
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

        if ($request->has('type')) {
            $posts->typeAnime($request->type);
        }

        $posts = $posts->paginate()->withQueryString();

        abort_if($posts->isEmpty(), 404);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->loadExists([
            'users' => fn($q) => $q->where('users.id', auth()->id()),
        ])->load([
            'comments' => fn($q) => $q->with(['user.vip', 'user.user']),
            'series' => fn($q) => $q->with(['stud', 'kach']),
        ]);

        $viewingOrder = GodWip::orderBy('title')
            ->whereHas('posts', fn($q) => $q->whereTitle($post->title)->where('id', '!=', $post->id))
            ->with(['posts' => fn($q) => $q->whereTitle($post->title)
                ->with(['tv'])])
            ->get();

        $similarPosts = Post::base()
            ->categories($post->categories)
            ->take(4)
            ->orderBy('id', 'desc')
            ->get();

        return view('posts.show', compact('post', 'viewingOrder', 'similarPosts'));
    }

    public function category($type, $category)
    {
        $posts = Post::post($type)
            ->category($category)
            ->orderBy('date', 'desc')
            ->paginate(28);

        return view('posts.index', compact('posts'));
    }


}
