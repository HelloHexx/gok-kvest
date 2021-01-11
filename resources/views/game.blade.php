<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Онлайн-квест. Квест предполагает пешую прогулку по Калуге, в пути турист пользуется специально разработанным интернет-сервисом, который координирует его передвижение. Ответы на вопросы квеста отсылаются со смартфона, правильный ответ открывает возможность для продолжения пути. Квест бесплатный, необходима лишь небольшая регистрационная форма">
    <title>-KVEST-</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> {{-- --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript>
     <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
 </noscript> {{-- --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- CSS CDN линк для карты --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" /> {{-- --}}
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/game.js')}}"></script>

    <style>
        .modal-body{
            max-height: 300px; 
            overflow-y: auto;
        }
        .btn-user{
            background-color: aliceblue;
            color: black;
        }
    </style>
</head>

<body>
    @if(isset(Auth::user()->way))
    <header class="shadow-lg">
      <div  >
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="row  border-bottom border-success " style="padding-bottom: 20px;">

              <div class="col-sm-6">
                  <a class="btn btn-light" href="/">Главная страница</a>
              </div>

              <div class="col-sm-6">
                  <a class="btn btn-light" data-toggle="modal" data-target="#Rule">Правила игры</a>
              </div>
          
              <div class="col-sm-6">
                {{--  <div class="col-sm-6">
                    <h5 style="color: aliceblue">Основной интерфейся</h5>
                    <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Информация от
                        текущей цели</a>

                </div>  --}}
                  <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Новая Игра</a>
              </div>
            
              <div class="col-sm-6">
                  <form action="{{route('logout')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-light">Выйти</button>
                  </form>
              </div>
          </div>
          <div class="row" style="padding-top: 20px ">
            <div class="col-sm-6 border-bottom border-success " style="color: aliceblue">
              <h5>Информация о Аккаунте</h5>
              <p>Имя: {{Auth::user()->name}}</p>
              <p>Email:{{Auth::user()->email}}</p>
              <p>Выбранный маршрут: @if(Auth::user()->way) Короткий @else Длинный @endif </p>
            </div>
            <div class="col-md-6  border-bottom border-success " style="color: aliceblue">
              <h5>Пройденные задания</h5>
              @foreach ($passed->passed_tasks as $item)
                  <a href="/info/{{$item}}">{{$item}}</a>
              @endforeach
            </div>
          </div>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            Меню
          </button>
        </nav>
      </div>



                        
    </header>
        <div class="container" style="margin-top: 40px">
            @if (session('alert'))
          <p class="shadow-lg p-3 mb-5 rounded"  style="color: black;-webkit-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          -moz-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          background-color: lightblue;
          text-align: center;
          ">
          Предыдущй вопрос пропущен!
          <br>
              <strong>{{ session('alert') }}</strong>
          </p>
         @endif
          @if (session('status'))
          <p class="shadow-lg p-3 mb-5 bg-white rounded"  style="color: black;-webkit-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          -moz-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          ">
              {{ session('status') }}
          </p>
         @endif
         <p class="shadow-lg p-3 mb-5 bg-white rounded"  style="color: black;-webkit-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          -moz-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          text-align: center
          ">
           <strong>Адрес текущей цели</strong>
           <br>
           {{$marker->adress}}
           <br>
          </p>

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

         <p class="shadow-lg p-3 mb-5 bg-white rounded"  style="color: black;-webkit-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          -moz-box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          box-shadow: 4px 22px 31px 16px rgba(0,0,0,0.86);
          text-align: center
          ">
          <strong>Полезная информация</strong>
          <br>
          {{$marker->info}}
          </p>         
        </div>
    <div class="container">
        <div class="center">
            <div id="mapid" class="map"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Вы уверены?
                    </h5>
        </button>
                </div>
                {{--  <div class="modal-body">
                    @if (isset($marker->name)) Название:{{$marker->name}} @else Общая информация: Ошибка. Обратитесь к администратору. @endif
                    <br> @if (isset($marker->info)) Общая информация:{{$marker->info}} @else Общая информация: Ошибка. Обратитесь к администратору. @endif
                    <br> Адрес: @if (isset($marker->adress)) {{$marker->adress}} @else Ошибка. Обратитесь к администратору. @endif
                </div>  
                --}}
                <div class="modal-body">
                    <a type="button" class="btn btn-danger" href="/newgame">Да</a>
                    <a type="button" class="btn btn-success" data-dismiss="modal">Отмена</a>
                    
                </div>
                {{--  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>  --}}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Rule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Инструкция
                    </h5>
        </button>
                </div>
                <div class="modal-body" style=" overflow-y: scroll;
                overflow-x: auto;">
                    Перед вами окно игры. Чтобы продвинуться дальше по квесту вы должны ответить на вопрос (Окошко с надписью "Вопрос"). Он может быть связан с внешним видом достопримечательности или его историей. Под этим окном находится короткая справка по текущей цели, в ней могут содержаться подсказки к вопросам. Над окошком "Вопрос" Вы можете найти адрес текущей цели, а в самом низу страницы точку на карте. Также на странице присутствует меню, где вы сможете выйти из аккаунта, вернуться на главную страницу, начать игру заново или посмотреть полезную информацию о пройденных целях.
                    <br> Удачи!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    @if(!Session('visit'))
    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="My" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my">
                        Правила игры
                    </h5>
        </button>
                </div>
                <div class="modal-body bd-example-modal-lg">
                   Перед вами окно игры. Чтобы продвинуться дальше по квесту вы должны ответить на вопрос (Окошко с надписью "Вопрос"). Он может быть связан с внешним видом достопримечательности или его историей. Под этим окном находится короткая справка по текущей цели, в ней могут содержаться подсказки к вопросам. Над окошком "Вопрос" Вы можете найти адрес текущей цели, а в самом низу страницы точку на карте. Также на странице присутствует меню, где вы сможете выйти из аккаунта, вернуться на главную страницу, начать игру заново или посмотреть полезную информацию о пройденных целях.
                    <br> Удачи!
                </div>
                <div class="modal-footer">
                    <form action="{{url('/visit')}}" method="GET" >
                        @csrf
                        <input type="submit" class="btn btn-secondary" value="Закрыть" >
                    </form>
                </div>
            </div>
        </div>
    </div>
   @endif
   @endif


   @if(!isset(Auth::user()->way))
   <!-- Banner -->
<section id="banner" style="margin-top: 0;">
    <header>
        <h2>Начало игры</h2>
    </header>

    Пожалуйста, перед стартом квеста выберите маршрут, который собираетесь пройти.
                <br>
                <p><strong>Длинный маршрут</strong> - занимает ~3 часа (7 км). За это время вы обойте 14 точек, которые являются наиболее значимыми достопримечательностями нашего города. Маршрут подойдет тем, кто не сомневается в своей стойкости.</p>
                <br>
                <p><strong>Короткий маршрут</strong> - занимает ~1,5 часа (2,5 км.). За это время вы обойдете 7 точек. Выбрав этот путь, вы пройдете по главным местам интереса нашего города и события "Новогодняя столица". Маршрут подходит для всей семьи.</p>
    <footer>
        <div class="container">
               <div class="modal-footer">
                <p>Выберите маршрут:</p>
                <form action="{{url('/long')}}" method="GET" >
                    @csrf
                    <input type="submit" class="btn btn-secondary btn-user" value="Длинный" style="color: black; background-color: aliceblue">
                    {{--  <button type="submit" class="btn btn-secondary">Закрыть</button>  --}}
                </form>
                <form action="{{url('/short')}}" method="GET" >
                    @csrf
                    <input type="submit" class="btn btn-secondary btn-user" value="Короткий" style="color: black; background-color: aliceblue" >
                    {{--  <button type="submit" class="btn btn-secondary">Закрыть</button>  --}}
                </form>

            </div>
            {{-- <a href="/game"><button  style="background-color: aliceblue; color:black">Вернуться к игре</button></a>  --}}
        </div>
    </footer>
</section>
   @endif

    <footer>
        <section id="footer" style="padding-bottom: 50px">
           <ul class="icons">
            <li><a href="https://vk.com/kaluga_gok" target="_blank"><img src="{{ asset('images/ico/vk.png') }}" alt="vk"
                        width="32px"></a></li>
                        <li><a href="https://www.instagram.com/web_kvest40/" target="_blank"><img src="{{asset('images/ico/inst.png')}}" alt="instagram" width="32px"></a></li>
        </ul>
            <div class="copyright">
                <ul class="menu">
                    <li>Разработано: Новиковым В.С.</li>
                    <li><a href="https://www.orijinx-studio.ru/" target="_blank">ORIJINX</a></li>
                </ul>
                <a href="/" style="">На главную</a>
                <br>
                <a href="https://forms.yandex.ru/u/5ff8d0597294e42880b942ff/">Связь с автором</a>
            </div>
        </section>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- --}} {{-- CDN Скрипт КАРТЫ --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    {{-- СКРИПТ ДЛЯ КАРТЫ --}}
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    {{-- --}}




    <script>
        var mymap = L.map('mapid').setView([54.514638, 36.255683], 13);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        


       
        @if(isset($marker-> coord))
        var marker= L.marker([{{ $marker->coord }}]).addTo(mymap);  
        var popup{{ $marker->id }} = L.popup();
        @else
        var marker = L.marker([54.514638, 36.255683]).addTo(mymap);
        @endif
                      
    
                    
    
                    function MarkClick_(e) {
                    popup{{ $marker->id }}
                        .setLatLng(e.latlng)
                        .setContent("Адрес:{{ $marker->adress }}")
                        .openOn(mymap);
                    }
                    marker.on('click', MarkClick_);
        
                


    </script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#MyModal').modal('show');
        });
        $("#close").click(function() {
            $('#myModal').modal('dispose');
        });
    </script>
</body>

</html>