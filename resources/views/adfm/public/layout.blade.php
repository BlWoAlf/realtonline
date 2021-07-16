<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('meta-title')@show</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='stylesheet' href="{{asset('css/app.css')}}">
</head>
<body>
    <header class="header">
        <div class="container header__container">
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('images/logo.png')}}">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-8 col-xl-7 col-xxl-6 offset-xxl-1 col__menu">
                    <nav class="header__menu">
                        @php($links = \App\Models\Adfm\Menu::getData('main'))
                        <ul class="menu horizontal-list menu__list">
                            @foreach ($links[0] as $el)
                                <li class="list__item"><a href="{{$el->link}}">{{$el->title}}</a></li>                                
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-6 col-md-4 col-lg-2 col-xl-3">
                    <div class="contacts header__contacts">
                        <div class="contacts__phone">
                            <a href="tel:+79233337000">+7-923-333-7000</a>
                        </div>
                        <div class="contacts__socical">
                            <div class="contacts__inst">
                                <a href="" target="_blank"><i class="fab fa-instagram"></i><span>@realtonline</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-burger-button">
                    <div class="header__burger-button">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container footer__container">
            <div class="row">
                <div class="col-12">
                    <div class="footer__menu">
                        <ul class="menu  menu__list">
                            @foreach ($links[0] as $el)
                                <li class="list__item"><a href="{{$el->link}}">{{$el->title}}</a></li>                                
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="contacts footer__contacts">
                        <div class="contacts__phone">
                            <a href="tel:+79233337000">+7-923-333-7000</a>
                        </div>
                        <div class="contacts__socical">
                            <div class="contacts__inst">
                                <a href=""><i class="fab fa-instagram"></i><span>@realtonline</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 offset-md-5">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('images/logo.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
