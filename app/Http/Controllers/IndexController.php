<?php

namespace App\Http\Controllers;

use App\Models\Post\Post;
use App\Models\Site\Slider;
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
                ->latest('date')
                ->take(10)
                ->get();
        });


        $newPosts = Cache::rememberForever('newPosts', function () {
            return Post::post('anime')
                ->latest('id')
                ->take(5)
                ->get();
        });

        $dorams = Cache::rememberForever('dorams', function () {
            return Post::post('dorams')
                ->latest('id')
                ->take(5)
                ->get();
        });

        return view('index', compact('sliders', 'posts', 'newPosts', 'dorams'));
    }

}
