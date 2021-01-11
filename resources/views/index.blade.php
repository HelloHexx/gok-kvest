@extends('layouts.layout')

@section('body')

    <!-- Header -->
    <section id="header">
        <header  >
            <div class="container">
                <h1 style="font-size:150%">ГОСТЕПРИИМНАЯ КАЛУГА</h1>
            <p>Онлайн-квест by Orijinx</p>
            </div>
        
            <!-- <img class="logo-img" src="{{ asset('images/winter-logo.png') }}" alt="Новогодняя калуга"> -->
            
        </header>
        <footer>
            <a href="#mapid" class="button style2 scrolly-middle">Перейти к игре</a>
        </footer>
    </section>

    <!-- Banner -->
    <section id="banner">
        <header>
            <h2>О квесте</h2>
            
        </header>
        <div class="container">
            <h4>Добро пожаловать в Калугу!</h4>
            <p> Город является административным центром Калужской области, расположен на берегах Оки и её притоков — Яченки,
                Калужки, Киёвки. О происхождении названия города существует множество версий. Самые популярные для ученых и
                жителей города: от названия речки Калужки и от старорусского калуга (халуга), что означало топь, болото,
                стоячую воду. Официальной датой основания города считается 1371 год, — год первого упоминания Калуги в
                письменных источниках, дошедших до наших времён, однако исследователи сходятся во мнении, что город стоял
                здесь гораздо раньше. Жизнь на территории Калужской области течет со времен Каменного века, самые древние
                находки относятся к раннему палеолиту. Началом же относительно современной истории можно считать Пятый век
                нашей эры, когда первопредок восточного славянского племени князь Вятко привел вятичей к берегам реки
                Калужки... Отправимся и мы в путь!
            </p>
            <hr>
            {{--  <h3>Отправляемся</h3>  --}}
            <h2>Начинаем!</h2>
            <p>Предлагаем вам поиграть в интерактивный квест! Ваша задача - пройти обзорную экскурссию по Калуге и разгадать все загадки! Все просто, согласны? Тогда в перед!</p>
        </div>


        <header>
            <h3>НА КАРТЕ</h3>
        </header>
        <div class="container">
            <p>На этой карте расположены все точки, которые вам предстоит обойти. Существует два маршрута - длинный и короткий. Время прохождения <strong>2,5</strong>  и <strong>1,5</strong> часа соотвественно. </p>
            <p><span style="font-size: 12px"><i>(Короткий маршрут затрагивает только часть точек)</i> </span></p>
        </div>
        <div class="center">
            <div id="mapid" class="map"></div>
        </div>

        <footer>
            @if (Auth::check())
                <a href="/game"><button class="button style2 scrolly" style="margin-bottom: 5px">Вернуться к
                        игре</button></a>
                <a href="/newgame"><button class="button style2 scrolly" style="margin-bottom: 5px">Новая игра</button></a>
            @else
                <a class="button style2 scrolly" href="/register" style="margin-bottom: 5px">Регистрация</a>
                <a class="button style2 scrolly" href="/login" style="margin-bottom: 5px">Войти</a>
            @endif
        </footer>
        @if(isset($comm))
        <hr>
        <h3>Отзывы</h3>
        <div class="container" style="margin-top:20px">
            
            <div class="row">
                @foreach ($comm as $i)
                <div style="width:100%">
                    <div class="comm" style="border: gainsboro 2px solid;background-color: white;  color: black; padding: 10px">
                      <h5 style="text-align: left">{{$i->from}}</h5>
                      <hr>
                      <p style="color: rgb(0, 0, 0);text-align: center">{{$i->text}}</p>
                      <p style="text-align: right; font-size: 10px">{{$i->created_at}}</p>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>

    {{--
    <!-- Feature 1 -->
    <article id="first" class="container box style1 right">
        <a href="#" class="image fit"><img src="{{ asset('images/pic01.jpg') }}" alt="" /></a>
        <div class="inner">
            <header>
                <h2>Lorem ipsum<br />
                    dolor sit amet</h2>
            </header>
            <p>Tortor faucibus ullamcorper nec tempus purus sed penatibus. Lacinia pellentesque eleifend vitae est elit
                tristique velit tempus etiam.</p>
        </div>
    </article>

    <!-- Feature 2 -->
    <article class="container box style1 left">
        <a href="#" class="image fit"><img src="{{ asset('images/pic02.jpg') }}" alt="" /></a>
        <div class="inner">
            <header>
                <h2>Mollis posuere<br />
                    lectus lacus</h2>
            </header>
            <p>Rhoncus mattis egestas sed fusce sodales rutrum et etiam ullamcorper. Etiam egestas scelerisque ac duis
                magna lorem ipsum dolor.</p>
        </div>
    </article>

    <!-- Portfolio -->
    <article class="container box style2">
        <header>
            <h2>Magnis parturient</h2>
            <p>Justo phasellus et aenean dignissim<br />
                placerat cubilia purus lectus.</p>
        </header>
        <div class="inner gallery">
            <div class="row gtr-0">
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/01.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/01.jpg') }}" alt="" title="Ad infinitum" /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/02.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/02.jpg') }}" alt="" title="Dressed in Clarity" /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/03.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/03.jpg') }}" alt="" title="Raven" /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/04.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/04.jpg') }}" alt=""
                            title="I'll have a cup of Disneyland, please" /></a></div>
            </div>
            <div class="row gtr-0">
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/05.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/05.jpg') }}" alt="" title="Cherish" /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/06.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/06.jpg') }}" alt="" title="Different." /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/07.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/07.jpg') }}" alt="" title="History was made here" /></a></div>
                <div class="col-3 col-12-mobile"><a href="{{ asset('images/fulls/08.jpg') }}" class="image fit"><img
                            src="{{ asset('images/thumbs/08.jpg') }}" alt="" title="People come and go and walk away" /></a>
                </div>
            </div>
        </div>
    </article>

    <!-- Contact -->
    <article class="container box style3">
        <header>
            <h2>Nisl sed ultricies</h2>
            <p>Diam dignissim lectus eu ornare volutpat orci.</p>
        </header>
        <form method="post" action="#">
            <div class="row gtr-50">
                <div class="col-6 col-12-mobile"><input type="text" class="text" name="name" placeholder="Name" /></div>
                <div class="col-6 col-12-mobile"><input type="text" class="text" name="email" placeholder="Email" />
                </div>
                <div class="col-12">
                    <textarea name="message" placeholder="Message"></textarea>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>

    <!-- Generic -->
    
                       <article class="container box style3">
                        <header>
                         <h2>Generic Box</h2>
                         <p>Just a generic box. Nothing to see here.</p>
                        </header>
                        <section>
                         <header>
                          <h3>Paragraph</h3>
                          <p>This is a subtitle</p>
                         </header>
                         <p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
                         habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
                         leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
                         amet risus elit.</p>
                        </section>
                        <section>
                         <header>
                          <h3>Blockquote</h3>
                         </header>
                         <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
                         tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
                        </section>
                        <section>
                         <header>
                          <h3>Divider</h3>
                         </header>
                         <p>Donec consectetur <a href="#">vestibulum dolor et pulvinar</a>. Etiam vel felis enim, at viverra
                         ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                         facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                         tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                         posuere cubilia.</p>
                         <hr />
                         <p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
                         ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                         facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                         tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                         posuere cubilia.</p>
                        </section>
                        <section>
                         <header>
                          <h3>Unordered List</h3>
                         </header>
                         <ul>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                         </ul>
                        </section>
                        <section>
                         <header>
                          <h3>Ordered List</h3>
                         </header>
                         <ol>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                          <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                         </ol>
                        </section>
                        <section>
                         <header>
                          <h3>Table</h3>
                         </header>
                         <div class="table-wrapper">
                          <table>
                           <thead>
                            <tr>
                             <th>ID</th>
                             <th>Name</th>
                             <th>Description</th>
                             <th>Price</th>
                            </tr>
                           </thead>
                           <tbody>
                            <tr>
                             <td>45815</td>
                             <td>Something</td>
                             <td>Ut porttitor sagittis lorem quis nisi ornare.</td>
                             <td>29.99</td>
                            </tr>
                            <tr>
                             <td>24524</td>
                             <td>Nothing</td>
                             <td>Ut porttitor sagittis lorem quis nisi ornare.</td>
                             <td>19.99</td>
                            </tr>
                            <tr>
                             <td>45815</td>
                             <td>Something</td>
                             <td>Ut porttitor sagittis lorem quis nisi ornare.</td>
                             <td>29.99</td>
                            </tr>
                            <tr>
                             <td>24524</td>
                             <td>Nothing</td>
                             <td>Ut porttitor sagittis lorem quis nisi ornare.</td>
                             <td>19.99</td>
                            </tr>
                           </tbody>
                           <tfoot>
                            <tr>
                             <td colspan="3"></td>
                             <td>100.00</td>
                            </tr>
                           </tfoot>
                          </table>
                         </div>
                        </section>
                        <section>
                         <header>
                          <h3>Form</h3>
                         </header>
                         <form method="post" action="#">
                          <div class="row">
                           <div class="col-6 col-12-mobile">
                            <input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
                           </div>
                           <div class="col-6 col-12-mobile">
                            <input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
                           </div>
                           <div class="col-12">
                            <select name="department" id="department">
                             <option value="">Choose a department</option>
                             <option value="1">Manufacturing</option>
                             <option value="2">Administration</option>
                             <option value="3">Support</option>
                            </select>
                           </div>
                           <div class="col-12">
                            <input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
                           </div>
                           <div class="col-12">
                            <textarea name="message" id="message" placeholder="Enter your message"></textarea>
                           </div>
                           <div class="col-12">
                            <ul class="actions">
                             <li><input type="submit" value="Submit" /></li>
                             <li><input type="reset" class="style3" value="Clear Form" /></li>
                            </ul>
                           </div>
                          </div>
                         </form>
                        </section>
                       </article>  --}}
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
                               <li><a href="https://webmaster.yandex.ru/siteinfo/?site=https://kaluga-kvest.online"><img width="88" height="31" alt="" border="0" src="https://yandex.ru/cycounter?https://kaluga-kvest.online&theme=light&lang=ru"/></a></li>
                                </ul>
                                <a href="/" style="">На главную</a>
                <br>
                <a href="/politica" style="">Политика конфиденциальности</a>
                <br><a href="https://forms.yandex.ru/u/5ff8d0597294e42880b942ff/">Связь с автором</a>
                            </div>
                        </section>

@endsection
    


@section('scripts')
                        <script>
                            var mymap = L.map('mapid').setView([54.514638, 36.255683], 13);

                        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(mymap);

                        {{-- var json = SendDataWithResponse('http://hakkaton/startgame');
                        alert(json);
                        var pars = JSON.parse(json);
                        alert(pars.adress) --}}

                        @foreach ($markers as $item)
            //////////////////////////{{ $item->id }}////////////////////////////////////////////////////////////
                        var marker{{ $item->id }} = L.marker([{{ $item->coord }}]).addTo(mymap);    

                        var popup{{ $item->id }} = L.popup();

                        function MarkClick_{{ $item->id }}(e) {
                        popup{{ $item->id }}
                            .setLatLng(e.latlng)
                            .setContent("Название:{{ $item->name }}\n" +
                                "Адрес:{{ $item->adress }}")
                            .openOn(mymap);
                        }
                        marker{{ $item->id }}.on('click', MarkClick_{{ $item->id }});
            //////////////////////////////////////////////////////////////////////////////////////
                        @endforeach
                        </script>
@endsection
