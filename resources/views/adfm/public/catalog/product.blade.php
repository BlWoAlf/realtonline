@extends('adfm::public.layout')
@section('meta-title', $product->title)

@section('content')
<section class="section section__product">
    <div class="container">
        <div class="section__header product__header">
            <h1 class="h1-header text_no-margin">{{$product->title}}</h1>
        </div>
        <div class="section__content">
            <div class="product__price product__price_page">3 500 000 руб.</div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="product__gallary">
                        <div class="gallary__view-photo">
                            <div class="gallary__img">
                                <img src="../images/photo_view.jpg">
                            </div>
                        </div>
                        <div class="gallary__trumbnails">
                            <div class="row">
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        <img src="../images/photo.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="product__info">
                        <div class="product__price-info-box">
                            <div class="product__price-info">
                                <div class="product__price product__price_info">{{$product->price}} ₽</div>
                                <div class="product__price_info-one">(93800 ₽ за м2)</div>
                            </div>
                            <div class="service__image-block product__price-image">
                                <div class="service__image">
                                    <img src="../images/dom.png">
                                </div>
                            </div>
                        </div>
                        <div class="pdoduct__main-info-box">
                            <div class="main-info-box__header">Дополнительная информация</div>
                            <div class="main-info-box__content">
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Этаж</div>
                                    <div class="main-info-box__prop-value">23\28</div>
                                </div>
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Площадь</div>
                                    <div class="main-info-box__prop-value">23 кв. м.</div>
                                </div>
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Лифт</div>
                                    <div class="main-info-box__prop-value">Есть</div>
                                </div>
                            </div>
                        </div>
                        <div class="product__contacts-info-box">
                            <div class="contacts-info-box__number">
                                <a href="tel:+79233337000">+7-923-333-7000</a>
                            </div>
                            <button class="contacts-info-box__button">Задать вопрос</button>
                            <div class="contacts-info-box__sub-info">Будут предложены разные варианты общения</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="product__description">
                        {!! $product->content !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="product__catalog">
                        <div class="catalog__header">Другие объявления</div>
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                <div class="product">
                                    <a href="{{route('adfm.show.product', $product)}}">
                                        <div class="product__name">{{$product->title}}</div>
                                        <div class="product__image">
                                            @if (count($product->files) > 0)
                                                {!! ImageCache::get($product->files[0], ['w' => 300, 'h' => 163, 'fit' => 'crop']); !!}
                                            @endif
                                        </div>
                                        <div class="product__price">{{$product->price}} руб.</div>
                                        <button class="product__button">Смотреть подробнее</button>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section__filter">
    <div class="container">
        <div class="categories">
            <h1 class="h1-header align-center">Продолжить поиск недвижимости</h1>
            <div class="row">
                <div class="col5">
                    <div class="categories__category">
                        <span>Купить</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <span>Снять</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <span>Продать</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <span>Сдать</span>
                    </div>
                </div>
                <div class="col5">
                    <div class="categories__category">
                        <a href="">Ипотека онлайн</a>
                    </div>
                </div>
            </div>
        </div>
        <form class="filter">
            <div class="filter__field">
                <div class="field__name">Тип недвижимости</div>
                <div class="field__box field__box_select">
                    <select name="filter[type]">
                        <option>Квартиры</option>
                    </select>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Количество комнат</div>
                <div class="field__box field__box_select">
                    <select name="filter[room_count]">
                        <option>1- комнатные</option>
                    </select>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Стоимость</div>
                <div class="field__box field__box_from-to">
                    <label>
                        <span>От</span> <input type="text" name="filter[price:>]">
                    </label>
                    <label>
                        <span>До</span> <input type="text" name="filter[price:<]">
                    </label>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name">Площадь</div>
                <div class="field__box field__box_from-to">
                    <label>
                        <span>От</span> <input type="text" name="filter[square:>]">
                    </label>
                    <label>
                        <span>До</span> <input type="text" name="filter[square:<]">
                    </label>
                </div>
            </div>
            <div class="filter__field">
                <div class="field__name"></div>
                <div class="field__box field__box_button">
                    <button class="filter__button">Найти объявления</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection