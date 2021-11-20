<?php

namespace App\Http\View\Composers;

use App\Models\Comment;
use App\Models\Top;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SidebarPageComposer
{
    public function compose(View $view)
    {
        $topPosts = Cache::rememberForever('top', function () {
            return Top::orderByDesc('rating')
                ->with('post.tv')
                ->take(5)
                ->get();

        });

        $comments = Cache::rememberForever('comments', function () {
            return Comment::with(['user.vip', 'post.tv', 'user.role'])
                ->latest('id')
                ->take(5)
                ->get();
        });

        $view->with(['topPosts' => $topPosts, 'comments' => $comments]);
    }
}
