@extends('partials.layout')
@push('styles')
    <link rel="stylesheet" href="{{mix('css/film-page.css')}}">
@endpush

@section('content')
    <div id="film-content">
        <div class="film-discription-block">
            <div class="img-film-discription">
                <div class="favorites {{$post->users_exists ? 'choose': ''}}">
                    <i class="fa fa-star"></i>
                    <div
                        class="favorite-text">{{$post->users_exists ? 'Удалить из избранного' :'Добавить в избранное'}}</div>
                </div>
                <img src="{{asset($post->image)}}" alt="{{$post->title}}">

            </div>

            <div class="film-discription">
                <h1 class="film-discription-header">{{$post->full_title}}</h1>
                <div class="film-discription-header-translate">{{$post->alis}}</div>

                <ul class="distinctio-list">
                    <li>
                        <span class="distinctio-list-left">Жанры:</span>
                        <span class="distinctio-list-right">{{$post->categories->implode('title', ', ')}}</span>
                    </li>
                    <li>
                        <span class="distinctio-list-left">Год:</span>
                        <span class="distinctio-list-right">{{$post->year->title}}</span>
                    </li>

                    <li>
                        <span class="distinctio-list-left">Автор:</span>
                        <span class="distinctio-list-right">{{$post->user->login ?? ''}}</span>
                    </li>

                    <li class="review-order">
                        <span>Порядок просмотра:</span>
                        <ol class="review-order-list">
                            @foreach($viewingOrder as $order)
                                @foreach($order->posts as $item)
                                    <li>
                                        <a href="{{route('posts.show', $item->slug)}}">{{$item->full_title.' '.$order->title}}</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ol>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-discription">
            <div class="discription-header">Описание <span>аниме</span> <span>«{{$post->full_title}}»</span></div>

            <div class="discription-text">
                {!! $post->body !!}
            </div>

            <div class="show-all-text">Развернуть</div>
        </div>

        <player
            :kachs="{{json_encode($kachs)}}"
            :studs="{{json_encode($studs)}}"
            :series="{{json_encode($post->series)}}"
        >
        </player>

        @if($similarPosts->isNotEmpty())
            <div class="all-anime-block">
                <div class="head">
                    <div class="left-head">Смотрите также</div>
                </div>
                <div class="films">
                    @foreach($similarPosts as $similarPost)
                        @include('templates.main.post', ['posts.show' => $similarPost])
                    @endforeach
                </div>
            </div>
        @endif


        <div class="video-comments-block">
            <div class="head">
                <div class="left-head">Комментарии</div>
            </div>

            <!--Коментарий-->
            @auth()
                <form class="form-comment form">
                    <div class="disable">
                        <div class="loader">Loading...</div>
                    </div>
                    <!-- <textarea class="form-control" name="comment"  id="textComment" cols="80" rows="10" placeholder="Оставить коментарий..." ></textarea> -->
                    <textarea id="textComment" name="comment" class="form-control"
                              placeholder="Оставить коментарий..."></textarea>
                    <button class="btn btn-outline-secondary" type="button" id="sendComment">Оставить комментарий
                    </button>
                </form>
            @endauth
            <div class="video-comments">
                @foreach($post->comments as $comment)
                    <div class="video-comment-item">
                        <div class="video-comment-user-avatar">
                            <img src="{{$comment->user->avatar}}">
                        </div>

                        <div class="video-comment-right"
                             @class([
                        'vip' => !empty($comment->user->vip)])
                        style='background-image:{{asset($comment->user->vip->back_fon ?? '')}}'>
                        <div class="comment-arrow"></div>
                        <div class="top-video-comment-item">
                            <div class="video-comment-user-name">
                                <a href="{{route('profile', $comment->user->user->login ?? $comment->user->login)}}"
                                   style="{{$comment->user->vip->login_color ?? ''}}">{{$comment->user->user->login ?? $comment->user->login}}</a>
                                {{--                                    <span style="color:<?=$val['color']?>"><?=$val['status']?></span>--}}
                            </div>
                            <div class="video-comment-date">
                                {{$comment->created_at->format('d.m.Y h:i')}}
                            </div>
                        </div>
                        <div class="video-comment-text">
                            {!! $comment->body !!}
                            <div class="answer-comment"><i class="fa fa-reply"></i></div>
                        </div>
                        {{$comment->user->vip->status ?? ''}}
                    </div>

            </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="{{mix('js/post.js')}}"></script>
@endpush
