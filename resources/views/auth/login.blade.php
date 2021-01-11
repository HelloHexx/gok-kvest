@extends('layouts.layout')

@section('body')

    <section style="padding-top: 50px">
        <div class="container" style="border:white 1px solid; border-radius: 50px; background-color: white;padding: 10px">
            <header>
                <h3 style="text-align: center">Вход</h3>
            </header>
            <form method="post" action="{{ route('login') }}" style="padding-bottom:15%;padding-top:15%; ">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <input class="text" type="email" name="email" id="email" value="" placeholder="Email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input class="text" type="password" name="password" id="password" value="" placeholder="Пароль" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input style="all: revert;" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label" for="remember">
                            {{ __('Запомнить') }}
                        </label>

                    </div>
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="Войти" /></li>
                            
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <section id="footer" style="padding-bottom: 50px">
            <ul class="icons">
               

                <li><a href="https://vk.com/gameboii" target="_blank"><img src="{{ asset('images/ico/vk-ico2.svg') }}"
                            alt="vk" width="32px"></a></li>
              
            </ul>
            <div class="copyright">
                <ul class="menu">
                    <li>Разработанно: Новиковым В.С.</li>
                    <li><a href="https://www.orijinx-studio.ru/" target="_blank">ORIJINX</a></li>
                </ul>
                <a href="/" style="">На главную</a>
            </div>
        </section>
    </footer>

    
@endsection


{{--  
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
