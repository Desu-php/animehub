<?php

namespace App\Http\View\Composers;


use App\Models\Post\Cat;
use App\Models\Post\Year;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class FrontPageComposer
{
    public function compose(View $view)
    {

        $years = Cache::rememberForever('years', function () {
            return Year::orderBy('title')->get();
        });

        $categories = Cache::rememberForever('categories', function () {
            return Cat::all();
        });
        $view->with(['years' => $years, 'categories' => $categories]);
    }
}
