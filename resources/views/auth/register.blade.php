@extends('partials.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('css/regist.css')}}">

    <div id="regist">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="regist-header">Регистрация</div>
        <form class="registration-form" method="post" action="{{route('register.store')}}">
            @csrf
            <input type="hidden" name="g-recaptcha-response" id="recaptcha">
            <div class="registration-form-item">
                <span>Логин:</span>
                <div class="registration-input @if(!empty(old('login')))registration-input-focus @endif">
                    <input class="registration-input-item" value="{{old('login')}}"  name="login" type="text" required autocomplete="on">
                    <div class="registration-placeholder">Логин</div>
                </div>
            </div>
            <div class="registration-form-item">
                <span>E-mail:</span>
                <div class="registration-input">
                    <input class="registration-input-item @if(!empty(old('email')))registration-input-focus @endif" value="{{old('email')}}"
                           type="email" name="email" required autocomplete="on">
                    <div class="registration-placeholder">E-mail</div>
                </div>
            </div>
            <div class="registration-form-item">
                <span>Пароль:</span>
                <div class="registration-input">
                    <input class="registration-input-item"  name="password" type="password" required autocomplete="on">
                    <div class="registration-placeholder">Пароль</div>
                </div>
            </div>
            <div class="registration-form-item">
                <span>Повторите пароль:</span>
                <div class="registration-input">
                    <input class="registration-input-item" type="password" name="password_confirmation" required autocomplete="on">
                    <div class="registration-placeholder">Подтверждение пароля</div>
                </div>
            </div>
{{--            <div class="registration-form-item">--}}
{{--                <span>Captcha</span>--}}
{{--                <div class="registration-input">--}}
{{--                </div>--}}
{{--            </div>--}}
            <input type="submit" name="button" value="Отправить">
        </form>
    </div>
    {!! RecaptchaV3::initJs() !!}
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHAV3_SITEKEY') }}', {action: 'register'}).then(function(token) {
                console.log('token', token)
                if (token) {
                    document.getElementById('recaptcha').value = token;
                }
            });
        });
    </script>
@endsection
