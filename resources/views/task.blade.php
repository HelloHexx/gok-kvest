<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    {{-- --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
    </noscript>

    {{-- --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- CSS CDN линк для карты --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    {{-- --}}
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/game.js') }}"></script>
</head>

<body>
    <header class="shadow-lg">
        <div>
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <div class="row  border-bottom border-success " style="padding-bottom: 20px;">

                        <div class="col-sm-6">

                            <a class="btn btn-light" href="/">Главное меню</a>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-light" data-toggle="modal" data-target="#MyModal">Правила игры</a>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-light" href="/newgame">Новая Игра</a>
                        </div>

                        <div class="col-sm-6">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light">Выйти</button>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px ">
                        <div class="col-sm-6 border-bottom border-success " style="color: aliceblue">
                            <h5>Информация о Аккаунте</h5>
                            <p>Имя: {{ Auth::user()->name }}</p>
                            <p>Email:{{ Auth::user()->email }}</p>

                        </div>
                        <div class="col-md-6  border-bottom border-success " style="color: aliceblue">
                            <h5>Пройденные задания</h5>
                            <p>{{ implode($passed->passed_tasks) }}</p>
                        </div>

                        <div class="col-sm-6">
                            <h5 style="color: aliceblue">Основной интерфейся</h5>
                            <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Информация от
                                текущей цели</a>

                        </div>


                    </div>

                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    Меню
                </button>
            </nav>
        </div>
        {{-- <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <div class="container">
                        <div class="row ">

                            <div class="col-md-6">

                                <a class="btn btn-light" href="/">Главное меню</a>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-light" data-toggle="modal" data-target="#MyModal">Правила игры</a>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-light" href="/newgame">Новая Игра</a>
                            </div>

                            <div class="col-md-6">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light">Выйти</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="container">
                                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div> --}}


        <div class="jumbotron">
            <h1 class="display-4">Вопрос</h1>
            <p class="lead">{{ $task->question }}</p>
            <hr class="my-4">
            @if (session('status-ask'))
                <p>
                    {{ session('status-ask') }}
                </p>
                <br>
                <form action="/skip">
                    <input type="submit" value="Пропустить вопрос">
                </form>
            @endif
            
            {{-- <p>Использются служебные классы для типографики и расстояния содержимого
                в
                контейнере большего размера.</p> --}}

            <p class="lead">
            <form action="{{ url('/checkanswer') }}" method="GET">
                <div class="container" style="margin-top: 40px">
                    <div class="input-group mb-3">
                        <input name="answer" type="text" class="form-control" placeholder="Введите ответ"
                            aria-label="Спрятанный код" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn btn-info" type="submit" id="button-addon2">Проверить</button>
                        </div>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </header>

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
            </div>
        </section>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- --}}
    {{-- CDN Скрипт КАРТЫ --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    {{-- СКРИПТ ДЛЯ КАРТЫ --}}
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    {{-- --}}





</body>

</html>
