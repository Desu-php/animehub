<?php

namespace App\Http\View\Composers;


use App\Models\Cat;
use App\Models\Type;
use App\Models\Year;
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
        /*$types = Cache::rememberForever('types', function () {
            return Type::all();
        });*/
        $view->with(['years' => $years, 'categories' => $categories/*, 'types' => $types*/]);
    }
}
