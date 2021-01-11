@extends('layouts.layout')

@section('body')

    <section style="padding-top: 50px">
        <div class="container" style="border:white 1px solid; border-radius: 50px; background-color: white;padding: 10px">
            <header>
                <h3 style="text-align: center">Регистрация</h3>
            </header>
            <form method="post" action="{{ route('register') }}" style="padding-bottom:15%;padding-top:15%; ">
                @csrf
                <div class="row">
                    <div class="col-6 col-12-mobile">
                        <input class="text" type="text" name="name" id="name" value="{{old('name')}}" placeholder="Ваше имя" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 col-12-mobile">
                        <input class="text" type="text" name="email" id="email" value="{{old('email')}}" placeholder="Электронная почта" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="col-12">
                        <select name="department" id="department" name="from">
                            <option value="" selected>Вы из Калуги?</option>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div> --}}
                    <div class="col-12">
                        <input class="text" type="password" name="password" id="subject" placeholder="Пароль" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input class="text" type="password" name="password_confirmation" id="subject" value=""
                            placeholder="Повторите пароль" />
                    </div>
                    {{-- <div class="col-12">
                        <textarea name="message" id="message" placeholder="Enter your message"></textarea>
                    </div> --}}
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" value="Зарегестрироваться" /></li>
                            {{-- <li><input type="reset" class="style3" value="Очистить" />
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <section id="footer" style="padding-bottom: 50px">
            <ul class="icons">
                {{-- <li><a href="#" class="icon brands"><span class="label"><img
                                src="{{ asset('images/ico/vk-ico.svg') }}" alt="vk" width="32px"></span></a></li>
                --}}

                <li><a href="https://vk.com/gameboii" target="_blank"><img src="{{ asset('images/ico/vk-ico2.svg') }}"
                            alt="vk" width="32px"></a></li>
                {{-- <li><a href="#" class="icon brands fa-facebook-f"><span
                            class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
                <li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
                --}}
            </ul>
            <div class="copyright">
                <ul class="menu">
                    <li>Разработанно: Новиковым В.С.</li>
                    <li><a href="https://www.orijinx-studio.ru/" target="_blank">ORIJINX</a></li>
                </ul>
                <a href="/" style="">На главную</a>
                <br>
                <a href="/politica" style="">Политика конфиденциальности</a>
            </div>
        </section>
    </footer>

    {{-- <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
