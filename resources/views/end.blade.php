@extends('layouts.layout')

@section('body')

    <!-- Header -->
    <section id="header">
        <header style="color: lightgreen">
            <h1>Поздравляем!</h1>
            <p>Вы закончили игру!</p>
        </header>
    </section>

    <!-- Banner -->
    <section id="banner">
        <header>
            <h2>Благодарность</h2>
        </header>
        <div class="container">
            <p>Сегодня Вы поближе познакомились с прекрасным городом - Калугой.

                Не забывайте, что в "колыбели космонавтики" можно найти еще очень много красивых, интересных и памятных
                мест. Калуга - искренний город, и калужане, вторя девизу своего театра, смело могут сказать гостям и местным
                жителям: "Мы вас любим и ждем!"</p>
        </div>
        <hr>
        <header>
            <h3>Слова разработчика</h3>
        </header>
        <div class="container">
            <p>Друзья! Спасибо, что поиграли в мой квест! Надеюсь, вам было интересно погулять по нашему городу. Создать
                этот сайт в одиночку было бы трудоемкой задачей. Но мне помогали мои друзья! Я хочу высказать им свою
                благодарность.</p>
                <hr>
                <h3>Пожертвования</h3>
                <p>Разрабатывать и поддерживать такие проекты очень тяжело. Если вы хотите как-то отблагодарить создателя или помочь развитию проекта, то воспользуйтесь формой ниже. Спасибо!</p>
                <div>
                    <iframe src="https://yoomoney.ru/quickpay/shop-widget?writer=buyer&targets=&targets-hint=%D0%92%20%D0%BF%D0%BE%D0%B4%D0%B4%D0%B5%D1%80%D0%B6%D0%BA%D1%83%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0&default-sum=50&button-text=14&payment-type-choice=on&comment=on&hint=%D0%92%D0%B0%D1%88%D0%B8%20%D0%BF%D0%BE%D0%B6%D0%B5%D0%BB%D0%B0%D0%BD%D0%B8%D1%8F&successURL=&quickpay=shop&account=410011890678722" width="100%" height="319" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                </div>
                <hr>
            <h3>Люди приложившие руку к созданию приложения:</h3>
            <ul>
                <li>Новиков Владислав - идея, разработка, дизайн</li>
                <li>Орлова Екатерина - идея, дизайн</li>
                <li>Архипов Артем - редактирование текста</li>
                <li>Юлия Сарычева - тестирование</li>
            </ul>
        </div>
        <footer>
            <a href="/newgame"><button class="button style2 scrolly" style="margin-bottom: 5px">Новая игра</button></a>
        </footer>
        <hr>
        <div class="container">
            <form method="post" action="/add_comm" style="padding-bottom:15%;padding-top:15%; padding-left: 5px; padding-right: 5px; border: 2px gray solid; border-radius: 50px; background-color: snow ">
                @csrf

                    <div class="c" >
                        <label for="comment" style="color: black;">Поделитесь вашими впечатлениями!</label>
                        <textarea class="text" name="text" id="comment" cols="10" rows="5" style="border: green 2px solid;" placeholder="Введите ваш комментарий"></textarea>

                    </div>
                    <br>
                    <div class="col-12" style="margin-top: 5px">
                        <ul class="actions">
                            <li><input type="submit" value="Отправить" /></li>
                        </ul>
                    </div>
            </form>
        </div>
        <hr>
        <div class="container">
            <h3>Связь с автором</h3>
            <script src="https://yastatic.net/q/forms-frontend-ext/_/embed.js"></script><iframe src="https://forms.yandex.ru/u/5ff8d0597294e42880b942ff/?iframe=1" frameborder="0" name="ya-form-5ff8d0597294e42880b942ff" width="650"></iframe>
        </div>
    </section>
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
        </div>
    </section>

@endsection



@section('scripts')
@endsection
