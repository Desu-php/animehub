<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Анимехаб</title>
    <meta charset="utf-8">
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" >
    <link rel="shortcut icon" href="{{'images/favicon.png'}}" type="image/png">
    <meta name="description" content="Анимехаб">
    <meta name="keywords" content="ключи">
</head>
<body data-domen="{{url('/')}}" data-api="{{config('api.BASE_API')}}" data-url="{{config('api.BASE_URL')}}">
<!-- Backgrounds -->
<div class="background background-menu"></div>
<div class="background background-sign-in"></div>
<div class="message-place"></div>
<div class="show-chat">Открыть чат <i class="fa fa-comments"></i></div>

<div class="chat-block">
    <div class="chat-header">
        <div class="">Чат <i class="fa fa-comments"></i></div>

        <div class="cross-chat">
            <div class="cross-chat-line"></div>
            <div class="cross-chat-line"></div>
        </div>
    </div>
    <div id="chat">
        <div class="disable"><div class="load">Loading...</div></div>
        <i class="scroll-bottom show-scroll-bottom far fa-caret-square-down"></i>
    </div>
    @if(!Auth::check())
    <p style="color:red;text-align:center">Авторизуйтесь для использования чата</p>
    @else
    <div class="control-chat">
        <textarea id="redactor" name="chat"></textarea>
        <div class="stickers-block">
            <div class="toggle-block">
                <div class="toggle-sticker-arrows left-stickers"><div></div></div>

                <div class="toggle-stickers">
{{--                    <ul class="toggle-stickers-list">--}}
{{--                        <li class="toggle-sticker-itme" onclick="defaultStickers()"><img src="/templates/Admin/js/ckeditor/plugins/hkemoji/sticker/0.png"></li>--}}
{{--                        <?php if($_SESSION['status'] != 'Анимешник' && isset($_SESSION['auth'])): ?>--}}
{{--                        <li class="toggle-sticker-itme" onclick="facebookStickers()"><img src="/templates/Admin/js/ckeditor/plugins/hkemoji/sticker/facebookChat/facebook (0).png"></li>--}}
{{--                        <li class="toggle-sticker-itme" onclick="milkbottleStickers()"><img src="/templates/Admin/js/ckeditor/plugins/hkemoji/sticker/milkbottle/Milk Bottle--1.gif"></li>--}}
{{--                        <li class="toggle-sticker-itme" onclick="onionStickers()"><img src="/templates/Admin/js/ckeditor/plugins/hkemoji/sticker/onion/Onion--1.gif"></li>--}}
{{--                        <li class="toggle-sticker-itme" onclick="redChatStickers()"><img src="/templates/Admin/js/ckeditor/plugins/hkemoji/sticker/redChat/red (1).gif"></li>--}}
{{--                        <?php endif; ?>--}}

{{--                    </ul>--}}
                </div>

                <div class="toggle-sticker-arrows right-stickers"><div></div></div>
            </div>

            <div class="stickers-list-block">
                <ul class="stickers-list"></ul>
                <ul class="stickers-list"></ul>
                <ul class="stickers-list"></ul>
                <ul class="stickers-list"></ul>
                <ul class="stickers-list"></ul>
            </div>
        </div>
        <i class="far fa-smile"></i>
        <i id="sendChat" class="far fa-arrow-alt-circle-right"></i>
    </div>
    @endif
</div>


<div id="notification-page">
    <div class="top-notification">
        <div>Уведомления</div>

        <div class="notification-cross">
            <div class="notification-cross-line"></div>
            <div class="notification-cross-line"></div>
        </div>
    </div>

{{--    <div class="main-notification">--}}
{{--        <ul class="list-notification">--}}
{{--            <?php foreach ($notifications as $notification): ?>--}}
{{--            <li id="<?=$notification['id']?>" class="notification-item <?= $notification['view'] == 0 ? 'new-notification': '' ?>">--}}
{{--                <div class="notification-text">--}}
{{--                    <div class="notification-data">--}}
{{--                        <div class="title-notification"><?=$notification['title']?></div>--}}
{{--                        <div class="date-notification"><?=$helper::getWatch($notification['date'])?></div>--}}
{{--                    </div>--}}

{{--                    <p class="notification-description">--}}
{{--                    <?=$notification['description']?>--}}
{{--                    <div>Автор: <?=$notification['login']?></div>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <i class="fa fa-trash"></i>--}}
{{--            </li>--}}
{{--            <?php endforeach; ?>--}}
{{--        </ul>--}}
{{--    </div>--}}

    <div class="bottom-notification">Удалить все</div>
</div>

<div id="wrapper">
    <!-- Sign in -->
    <div id="sign-in">
        <div class="top">
            <div>Авторизация</div>
            <div class="exit-sign-in">
                <div class="exit-line f-line"></div>
                <div class="exit-line s-line"></div>
            </div>
        </div>

        <div class="main-sign-in-page">
            <form class="" action="{{url('/')}}back_animehub/login" method="post">
                <div class="sign-in-input">
                    <input type="text" name="login" class="main-input sign-in-input-item">
                    <div class="sign-in-placeholder">Ваш логин</div>
                </div>
                <div class="sign-in-input">
                    <input type="password" name="password" class="main-input sign-in-input-item">
                    <div class="sign-in-placeholder">Ваш пароль</div>
                </div>

                <input type="submit" value="Войти на сайт" name="enter" class="main-input">
                <div class="check-block">
                    <label for="check"><input type="checkbox" id="check"> Запомнить меня</label>
                </div>
            </form>
            <div class="bottom">
                <div class="forget-password">Забыли пароль?</div>
                <div class="registration"><a href="/registration">Регистрация</a></div>
            </div>
        </div>
    </div>

    <!-- Header -->
@include('partials.header')

<!-- Main page -->
    <div id="main">
    @yield('content')
    <!-- Main -->
        <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- Footer -->
       @include('partials.footer')
    </div>
    <span id="token" style="display:none;">{{csrf_token()}}</span>
    <!-- Yandex.Metrika informer -->
    <a class="metrika" href="https://metrika.yandex.ru/stat/?id=53707954&amp;from=informer"
       target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/53707954/2_1_8C959DFF_6C757DFF_1_uniques"
                                           style="width:80px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (уникальные посетители)" class="ym-advanced-informer" data-cid="53707954" data-lang="ru" /></a>
    <!-- /Yandex.Metrika informer -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(53707954, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/53707954" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
