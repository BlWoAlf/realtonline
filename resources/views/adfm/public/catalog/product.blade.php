@extends('adfm::public.layout')
@section('meta-title', $product->title)

@section('content')
<section class="section section__product">
    <div class="container">
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    
            <!-- Background of PhotoSwipe. 
                 It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>
        
            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">
        
                <!-- Container that holds slides. 
                    PhotoSwipe keeps only 3 of them in the DOM to save memory.
                    Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
        
                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">
        
                    <div class="pswp__top-bar">
        
                        <!--  Controls are self-explanatory. Order can be changed. -->
        
                        <div class="pswp__counter"></div>
        
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        
                        <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>
        
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>
        
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>
        
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
        
                </div>
        
            </div>
        
        </div>
        <div class="section__header product__header">
            <h1 class="h1-header text_no-margin">{{$product->title}}</h1>
        </div>
        <div class="section__content">
            <div class="product__price product__price_page">{{$product->format_price}} руб.</div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="product__gallary">
                        <div class="swiper-container">
                            @if (count($product->files) > 0)
                            <div class="swiper-wrapper">                                                                    
                                @foreach ($product->files as $file)
                                    <div class="swiper-slide">
                                        <div class="gallary__view-photo gallary__view">
                                            <div class="gallary__img">
                                                {!! ImageCache::get($file, ['w' => 870, 'h' => 422, 'fit' => 'crop']); !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev gallary__photo-slide-button"></div>
                            <div class="swiper-button-next gallary__photo-slide-button"></div>
                            @else
                            <div class="gallary__view-photo">
                                <div class="gallary__img">
                                    <img src="{{asset('images/no-image.png')}}">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="gallary__trumbnails">
                            <div class="row">
                                @if (count($product->files) > 0)
                                @foreach ($product->files as $photo)
                                <div class="col-6 col-sm-3">
                                    <div class="gallary__mini-photo">
                                        {!! ImageCache::get($photo, ['w' => 257, 'h' => 130, 'fit' => 'crop']); !!}
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="product__info">
                        <div class="product__price-info-box">
                            <div class="product__price-info">
                                <div class="product__price product__price_info">{{$product->format_price}} ₽</div>
                                <div class="product__price_info-one">({{round($product->price/$product->min_square)}} ₽ за м2)</div>
                            </div>
                            <div class="service__image-block product__price-image">
                                <div class="service__image">
                                    <img src="{{asset('images/dom.png')}}">
                                </div>
                            </div>
                        </div>
                        <div class="pdoduct__main-info-box">
                            <div class="main-info-box__header">Дополнительная информация</div>
                            <div class="main-info-box__content">
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Этаж</div>
                                    <div class="main-info-box__prop-value">{{$product->properties['floor']}}</div>
                                </div>
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Площадь</div>
                                    <div class="main-info-box__prop-value">{{$product->square}} кв. м.</div>
                                </div>
                                <div class="main-info-box__item">
                                    <div class="main-info-box__prop-name">Лифт</div>
                                    <div class="main-info-box__prop-value">@if ($product->properties['elevator'] == 1) Есть @else Нету @endif</div>
                                </div>
                            </div>
                        </div>
                        <div class="product__contacts-info-box">
                            <div class="contacts-info-box__number">
                                <a href="tel:+79233337000">+7-923-333-7000</a>
                            </div>
                            <a href="#section__feedback"><button class="contacts-info-box__button">Задать вопрос</button></a>
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
        </div>
    </div>
</section>
@include('adfm::public.filter-section');
@include('adfm::public.feedback-section')
@endsection