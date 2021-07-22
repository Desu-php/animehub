<div class="film-item">
    <a href="">
        <div class="background-film-item">
            <img src="{{$post->image}}" alt="{{$post->title.' '.$post->tv->title}}">
            <div class="over-back-film-item">
                <div class="circle">
                    <span class="review">{{$post->view->views}}</span>
                    <span>Просмотров</span>
                </div>
            </div>
        </div>
        <div class="ribbon">{{$post->anime->seria}}</div>
    </a>
    <div class="discription">
        <div class="film-name"><a href="/">{{$post->title.' '.$post->tv->title}}</a></div>
        <div class="film-gener">{{$post->categories->take(2)->implode('title', ', ')}}</div>
    </div>
</div>
