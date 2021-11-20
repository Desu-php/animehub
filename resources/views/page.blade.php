@extends('partials.layout')
@section('content')
<div id="content">

    <!-- поиск -->
    @include('templates.search')
    <div id="film-list-content">
        <div class="all-anime-list-block">
            @if($posts->count() > 0)
            <div class="head">
                <div class="left-head">{{$posts[0]->type->name}}</div>
            </div>
            @endif
            <div class="films">
                     @foreach ($posts as $post)
                <div class="film-item">
                    <a href="#">
                    <div class="background-film-item">
                <img src="{{$post->image}}" alt="{{$post->title}}">

                        <div class="over-back-film-item">
                            <div class="circle">
                                <span class="review">{{ $post->view->views }}</span>
                                <span>Просмотров</span>
                            </div>
                        </div>
                        <div class="ribbon">{{$post->anime->seria}}</div>
                    </div>
                    </a>
                    <div class="discription">
                        <div class="film-name"><a href="#">{{$post->title.' '.$post->tv->title}}</a></div>
                        <div class="film-gener">{{$post->categories->take(2)->implode('title', ', ')}}</div>
                    </div>
                </div>
                   @endforeach
            </div>
        </div>

    </div>
    {{--{{$posts->onEachSide(1)->links()}}--}}
</div>

@endsection
