<div id="sidebar">
    <div class="update-block">
        <div class="top-weak">
            <div class="sidebar-head"><a href="{{route('top')}}">Топ аниме</a></div>
            <div class="top-weak-img">
                <a href="/anime">
                    <img src="<?=$topPosts[0]->post->image?>" alt="">
                </a>
            </div>
            <ul class="top-weak-films">
                @foreach($topPosts as $index => $topPost)
                    <a href="/anime/">
                        <li>
                            <div
                                class="current-number @if($index == 0) current-number-active @endif">{{$index + 1}}</div>
                            <span class="top-weak-film-name">
                                {{$topPost->post->title.' '.$topPost->post->tv->title}}
                            </span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    {{--    <div class="questionnaire-block">--}}
    {{--        <div class="sidebar-head">Опросник</div>--}}
    {{--        <div class="questionnaire">--}}
    {{--            <div class="question" id="<?=$questions['id_questions']?>"><?=$questions['title_questions']?></div>--}}
    {{--            <div class="questionnaire-general-choose">Проголосовало: </div>--}}
    {{--            <div class="questionnaire-panel <?=empty($votedUser) ? : 'questionnaire-done';?> ">  <!--вот тут класс questionnaire-done надо добавить если чел зареган -->--}}
    {{--                <?php foreach ($answer as $value):?>--}}
    {{--                <div class="questionnaire-panel-item <?=empty($value['voted'])? : 'questionnaire-choose'?>">--}}
    {{--                    <div class="questionnaire-panel-item-shadow"></div>--}}
    {{--                    <span class="questionnaire-item" id="<?=$value['id_answers']?>"><?=$value['title_answers']?></span>--}}
    {{--                    <span class="questionnaire-length" data-length="<?=$value['total']?>">Проголосовало</span>--}}
    {{--                </div>--}}
    {{--                <?php endforeach;?>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <?php if (!empty($articles)): ?>--}}
    {{--    <div class="news-sidebar">--}}
    {{--        <div class="sidebar-head">Новости и статьи</div>--}}
    {{--        <?php foreach ($articles as $article): ?>--}}
    {{--        <div class="news-sidebar-item">--}}
    {{--            <div class="news-sidebar-text"><?=$article['title']?></div>--}}
    {{--            <a href="<?=$helper::renderUrl($article['id'],$article['alias'])?>" ><div class="news-sidebar-date">Статьи и Новости,<?=$helper::getWatch($article['date'])?></div></a>--}}
    {{--        </div>--}}
    {{--        <?php endforeach; ?>--}}
    {{--    </div>--}}
    <!--    --><?php //endif; ?>
    <div class="comments">
        <div class="sidebar-head">Комментарии</div>
        @foreach($comments as $comment)
            @php
                $vipUser = !is_null($comment->user->vip);
            @endphp
            <div class="comment-item">
                <a href="/profile/{{$comment->user->login}}">
                    <div class="comment-user">
                        <div class="user-avatar"><img loading="lazy" src="{{$comment->user->img}}" alt="avatar"></div>
                        <div class="user-name-comment"
                             @if($vipUser)
                                 style="{{$comment->user->vip->login_color}};
                             font-family: {{$comment->user->vip->font}}"
                            @endif
                        >{{$comment->user->login}}
                            <span
                                style="color: {{$comment->user->role->color}} @if($vipUser) font-family:{{$comment->user->vip->font}}@endif">
                        {{$comment->user->role->title}}
                    </span>
                        </div>
                    </div>
                </a>
                <div class="comment-text">{{$comment->body}}</div>
                @if($comment->post)
                    <a href="/">
                        <div class="comments-name-film">
                            {{$comment->post->title.' '.$comment->post->tv->title}}
                        </div>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</div>


