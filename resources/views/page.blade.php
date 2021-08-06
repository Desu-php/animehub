@extends('partials.layout')
@section('content')
<div id="content">

    <!-- поиск -->
    @include('templates.search')

    <style>
        @media screen and (min-width: 992px) {
            #menu > li:nth-child(1) {
                background: #D81C27;
                cursor: pointer;
            }

            #menu > li:nth-child(1) a  span {
                color: #fff !important;
            }
        }
        .ribbon {
        left: 17px;
    }
    </style>


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
                        <div class="film-name"><a href="#">{{$post->title.' '.$post->tv_title}}</a></div>
                        <div class="film-gener">{{$post->categories->take(2)->implode('title', ', ')}}</div>
                    </div>
                </div>
                   @endforeach
            </div>
        </div>

    </div>
    {{$posts->onEachSide(1)->links()}}
</div>

@endsection
