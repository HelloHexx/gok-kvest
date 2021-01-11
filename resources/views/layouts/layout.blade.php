<!DOCTYPE HTML>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="921d16e991d1e6b3" />
    <meta name="Description" content="Онлайн-квест. Квест предполагает пешую прогулку по Калуге, в пути турист пользуется специально разработанным интернет-сервисом, который координирует его передвижение. Ответы на вопросы квеста отсылаются со смартфона, правильный ответ открывает возможность для продолжения пути. Квест бесплатный, необходима лишь небольшая регистрационная форма">
    <meta name="Keywords" content="Калуга, квест, онлайн, чем заняться, Развлечения"> 
    <meta property="og:title" content="Гостепреимная Калуга" />
    <meta property="og:url" content="//https://kaluga-kvest.online" />
    <meta property="og:image" content="//{{ asset('images/winter-logo.png') }}" />
    
    <title>ГОСТЕПРИИМНАЯ КАЛУГА</title>
    <link rel="shortcut icon" href="{{asset('/images/controller.svg')}}" type="image/x-icon">
    <link href='{{ asset('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>
    <link rel="canonical" href="https://kaluga-kvest.online" />
    
    
    <!-- <script async src="https://cdn.ampproject.org/v0.js"></script> -->
    {{-- --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- CSS CDN линк для карты --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    {{-- --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
    </noscript>

    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/game.js')}}"></script>
    
    
   {{-- Yandex.Metrika counter--}}
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(70310344, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/70310344" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

</head>
<body class="is-preload">
    
@yield('body')



        {{-- --}}
    {{-- CDN Скрипт КАРТЫ --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    {{-- СКРИПТ ДЛЯ КАРТЫ --}}
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    {{-- --}}
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.poptrox.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

@yield('scripts')

    
</body>

</html>