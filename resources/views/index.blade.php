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
            'url' => url('/'),
            'posts' => $posts
        ])

        @include('templates.main.posts', [
            'title' => 'Все аниме',
            'url_title' => 'Смотреть все',
            'url' => url('/'),
            'posts' => $newPosts
        ])

        @include('templates.main.posts', [
           'title' => 'Все дорамы',
           'url_title' => 'Смотреть все',
           'url' => url('/'),
           'posts' => $dorams
       ])

    </div>

@endsection


