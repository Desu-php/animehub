<login v-model="openLogin"></login>
<profile-modal route="{{route('logout')}}" v-model="openProfile" :user="{{json_encode(auth()->user())}}">
    @csrf
</profile-modal>
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


    <div v-if="!store.auth" id="sign-in-button" @click="showLogin">Войти</div>
    <template v-else>
        <div id="notification"><span class="notification-length"></span><i class="fa fa-bell"></i></div>
        <div id="profile-button" @click="showProfile">Профиль</div>
    </template>
    <div id="menu-button">
        <div class="menu-lines">
            <div class="menu-line l1"></div>
            <div class="menu-line l2"></div>
            <div class="menu-line l3"></div>
        </div>
    </div>
</div>

