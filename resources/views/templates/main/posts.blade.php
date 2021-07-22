<div class="all-anime-block">
    <div class="head">
        <div class="left-head">{{$title}}</div>
        <a href="{{$url}}">
            <div class="right-head">{{$url_title}}</div>
        </a>
    </div>
    <div class="films">
        @foreach($posts as $post)
             @include('templates.main.post', compact('post'))
        @endforeach
    </div>
</div>
