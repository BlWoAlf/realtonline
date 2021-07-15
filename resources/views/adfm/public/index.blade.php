@extends('adfm::public.layout')
{{-- @section('meta-title', $page->title) --}}

@section('content')
    <section class="section section__filter">
        <div class="container">
            <div class="categories">
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
                            <span>От</span> <input type="number" name="filter[price:>]">
                        </label>
                        <label>
                            <span>До</span> <input type="number" name="filter[price:<]">
                        </label>
                    </div>
                </div>
                <div class="filter__field">
                    <div class="field__name">Площадь</div>
                    <div class="field__box field__box_from-to">
                        <label>
                            <span>От</span> <input type="number" name="filter[square:>]">
                        </label>
                        <label>
                            <span>До</span> <input type="number" name="filter[square:<]">
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
    <section class="section section__main-catalog">
        <div class="container">
            <div class="section__header">
                <h1 class="h1-header align-center">Наши услуги</h1>
            </div>
            <div class="section__content">
                <div class="menu-services">
                    <div class="row">
                        @php($uslugi = \App\Models\Adfm\Menu::getData('uslugi'))
                        @foreach ($uslugi[0] as $item)
                        <div class="col-12 col-lg-4 col__service">
                            <div class="services__item service">
                                <div class="service__text">
                                    <div class="service__header">{{$item->title}}</div>
                                    @if(isset($uslugi[$item->id]) && $item->id != 0)
                                    @foreach ($uslugi[$item->id] as $sub_item)
                                        <div class="service__sub-item">{{$sub_item->title}}</div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="service__image-block">
                                    {{-- @php(dd($item)) --}}
                                    @if (isset($item->image))
                                    <div class="service__image">
                                        {!! ImageCache::get($item->image, ['w' => 48, 'h' => 48, 'fit' => 'crop']); !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="section__header h1-margin-header">
                <h1 class="h1-header text_no-margin align-center">Избранные предложения</h1>
                <div class="sub-header-text">Здесь показаны объявления, которые наши менеджеры отобрали для вас вручную. Это наиболее интересные предложения на рынке по нашему мнению.</div>
            </div>
            <div class="section__content">
                <div class="main-catalog">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="product">
                                <a href="{{route('adfm.show.product', $product)}}">
                                    <div class="product__name">{{$product->title}}</div>
                                    <div class="product__image">
                                        @if (count($product->files) > 0)
                                            {!! ImageCache::get($product->files[0], ['w' => 300, 'h' => 163, 'fit' => 'crop']); !!}
                                        @else
                                            <img src="{{asset('images/no-image-min.png')}}">
                                        @endif
                                    </div>
                                    <div class="product__price">{{$product->format_price}} руб.</div>
                                    <button class="product__button">Смотреть подробнее</button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('adfm::public.feedback-section')
@endsection
