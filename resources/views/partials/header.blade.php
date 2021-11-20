@auth
    <div id="profile">
        <div class="top">
            <div>Профиль</div>
            <div class="exit-profile">
                <div class="exit-line f-line"></div>
                <div class="exit-line s-line"></div>
            </div>
        </div>

        <div class="main-sign-in-page">
            <div class="profile-data">
                <div class="profile-avatar">
                    <img src="{{asset(Auth::user()->user->img)}}" alt="avatar">
                </div>

                <div class="profile-name"
                    {{--                     style="font-family: {{Auth::user()->user->vip->font}}; {{Auth::user()->user->login_color}}"--}}
                >
                    {{Auth::user()->login}}
                </div>
            </div>

            <div class="profile-bottom">
                <div><a href="/profile/{{Auth::user()->login}}">Профиль</a></div>
                {{--            <?php if ($_SESSION['status'] != 'Анимешник' && $_SESSION['status'] != '_VIP_'): ?>--}}
                {{--            <div><a href="/admin/">Админ панель</a></div>--}}
                {{--            <?php if ($_SESSION['status'] == 'Админ' || $_SESSION['status'] == 'Модератор'): ?>--}}
                {{--            <div><a href="/dashboard/">Админ панель(новый)</a></div>--}}
                {{--            <?php endif; ?>--}}
                {{--            <?php endif; ?>--}}
                <div><a href="/favorites">Закладки: (<span
                            class="bookmark-quantity">{{Auth::user()->user->favorites()->count()}}</span>)</a></div>
                <div><a href="#"
                        onclick="(event) => event.preventDefault(); document.getElementById('logoutForm').submit()">Выйти</a>
                </div>
                <form hidden id="logoutForm" method="post" action="{{route('logout')}}">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endauth

<div id="header">
    <a href="{{url('/')}}">
        <div class="logo main-logo"><img alt="logo" draggable="false" class="logo-img"
                                         src="{{asset('images/logo.png')}}"></div>
    </a>
    <ul id="menu">
        <li class="active sub-menu top-menu">
            <a href="/anime"><span>Аниме</span></a>
            <div id="sub-menu">
                <div class="left-part-sub-menu">
                    <span class="sub-menu-header">По типу</span>
                    <ul class="qualification-list">
                        <li><a href="{{url('/')}}/type/tv">ТВ</a></li>
                        <li><a href="{{url('/')}}/type/ova">OVA</a></li>
                        <li><a href="{{url('/')}}/type/film">Фильм</a></li>
                        <li><a href="{{url('/')}}/type/amv">AMV</a></li>
                    </ul>

                    <span class="sub-menu-header">По годам</span>
                    <ul class="qualification-list">
                        @foreach($years as $year)
                            <li><a href="{{route('posts', 'anime?year='.$year->title)}}">{{$year->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="right-part-sub-menu-block">
                    @foreach($categories as $category)
                        <div class="category-item d-flex align-items-center">
                            <a href="{{route('category', ['anime', $category->slug])}}">{{$category->title}}</a>
                        </div>

                    @endforeach
                </div>
            </div>
        </li>

        <li class="top-menu"><a
                href="{{route('posts', 'anime')}}"><span>Аниме</span></a></li>
        <li class="top-menu"><a
                href="{{route('posts', 'dorams')}}"><span>Дорама</span></a></li>
        <li class="top-menu"><a
                href="{{route('category',['anime', 'ongoing'])}}"><span>Онгоинг</span></a></li>

    </ul>


    @guest
        <div id="sign-in-button">Войти</div>
    @endguest
    @auth
        <div id="notification"><span class="notification-length"></span><i class="fa fa-bell"></i></div>
        <div id="profile-button">Профиль</div>
    @endauth
    <div id="menu-button">
        <div class="menu-lines">
            <div class="menu-line l1"></div>
            <div class="menu-line l2"></div>
            <div class="menu-line l3"></div>
        </div>
    </div>
</div>

