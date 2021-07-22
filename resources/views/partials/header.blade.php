<?php

use App\Models\Year;
use App\Models\Cat;
use App\Models\Page;

$years = Year::orderBy('title')->get();
$categories = Cat::all();
$pages = Page::orderBy('order_menu')->get();
?>

@if(Auth::check())
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
                    {{--                <img src="<?=viewAvatar($user['img'])?>" alt="avatar">--}}
                </div>

                <div class="profile-name"
                     style="font-family: {{Auth::user()->user->font}}; {{Auth::user()->user->login_color}}">
                    {{Auth::user()->user->login}}
                </div>
            </div>

            <div class="profile-bottom">
                <div><a href="/profile/{{Auth::user()->user->login}}">Профиль</a></div>
                {{--            <?php if ($_SESSION['status'] != 'Анимешник' && $_SESSION['status'] != '_VIP_'): ?>--}}
                {{--            <div><a href="/admin/">Админ панель</a></div>--}}
                {{--            <?php if ($_SESSION['status'] == 'Админ' || $_SESSION['status'] == 'Модератор'): ?>--}}
                {{--            <div><a href="/dashboard/">Админ панель(новый)</a></div>--}}
                {{--            <?php endif; ?>--}}
                {{--            <?php endif; ?>--}}
                <div><a href="/favorites">Закладки: (<span
                            class="bookmark-quantity">{{Auth::user()->user->favorites()->count()}}</span>)</a></div>
                <div><a href="/logout?>">Выйти</a></div>
            </div>
        </div>
    </div>
@endif

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
                            <li><a href="{{url('/')}}year/{{$year->title}}">{{$year->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="right-part-sub-menu-block">
                    @foreach($categories as $category)
                        <div class="category-item d-flex align-items-center">
                            <a href="{{url('/')}}">{{$category->title}}</a>
                        </div>

                    @endforeach
                </div>
            </div>
        </li>

        @foreach($pages as $page)
            <li class="top-menu"><a
                    href="{{$page->alias}}"><span>{{$page->title}}</span></a></li>
        @endforeach
    </ul>


    @if(!Auth::check())
        <div id="sign-in-button">Войти</div>
    @else
        <div id="notification"><span class="notification-length"></span><i class="fa fa-bell"></i></div>
        <div id="profile-button">Профиль</div>
    @endif
    <div id="menu-button">
        <div class="menu-lines">
            <div class="menu-line l1"></div>
            <div class="menu-line l2"></div>
            <div class="menu-line l3"></div>
        </div>
    </div>
</div>

