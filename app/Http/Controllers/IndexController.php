<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    //
    public function index()
    {
        $sliders = Cache::rememberForever('sliders', function () {
            return Slider::with('post')->get();
        });

        $posts = Cache::rememberForever('posts', function () {
            return Post::post('anime')
                ->orderBy('date', 'DESC')
                ->take(10)
                ->get();
        });


        $newPosts = Cache::rememberForever('newPosts', function () {
            return Post::post('anime')
                ->orderBy('id', 'DESC')
                ->take(5)
                ->get();
        });

        $dorams = Cache::rememberForever('dorams', function () {
            return Post::post('dorams')
                ->orderBy('id', 'DESC')
                ->take(5)
                ->get();
        });

        return view('index', compact('sliders', 'posts', 'newPosts', 'dorams'));
    }

}
