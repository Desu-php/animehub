@extends('partials.layout')
@section('content')

    @include('templates.slider', compact('sliders'))

    <!-- Content -->
    <div id="content">

        <!-- поиск -->
        @include('templates.search')

        @include('templates.main.posts', [
            'title' => 'Новые серии аниме',
            'url_title' => 'Смотреть все новинки',
            'url' => route('posts', 'anime'),
            'posts' => $posts
        ])

        @include('templates.main.posts', [
            'title' => 'Все аниме',
            'url_title' => 'Смотреть все',
            'url' => route('posts', 'anime'),
            'posts' => $newPosts
        ])

        @include('templates.main.posts', [
           'title' => 'Все дорамы',
           'url_title' => 'Смотреть все',
           'url' => route('posts', 'dorams'),
           'posts' => $dorams
       ])

    </div>

@endsection


