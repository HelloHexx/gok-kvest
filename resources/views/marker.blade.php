@extends('layouts.layout')

@section('body')
<!-- Banner -->
<section id="banner" >
    <header>
        <h2>{{$marker->name}}</h2>
    </header>


    <footer>
        <div class="container-fluid">
            {{$marker->info}}
        </div>
        <hr>
        <div class="container">
            <a href="/game"><button  style="background-color: aliceblue; color:black">Вернуться к игре</button></a> 
        </div>
    </footer>
</section>
<section id="footer" style="padding-bottom: 50px">
    <ul class="icons">
        {{-- <li><a href="#" class="icon brands"><span class="label"><img src="{{ asset('images/ico/vk-ico.svg') }}" alt="vk" width="32px"></span></a></li> --}}
      
        <li><a href="https://vk.com/gameboii" target="_blank"><img src="{{ asset('images/ico/vk-ico2.svg') }}" alt="vk" width="32px"></a></li>
        {{-- <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
        <li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
        <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
        <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li> --}}
    </ul>
    <div class="copyright">
        <ul class="menu">
             <li>Разработанно: Новиковым В.С.</li> 
            <li><a href="https://www.orijinx-studio.ru/" target="_blank">ORIJINX</a></li>
        </ul>
        <a href="/" style="">На главную</a>

    </div>
</section>
@endsection