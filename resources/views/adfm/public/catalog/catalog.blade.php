@extends('adfm::public.layout')
{{-- @section('meta-title', $catalog->title) --}}

@section('content')
@include('adfm::public.filter-section');
<section class="section section_page section__catalog section__about-page section__main-catalog">
    <div class="container">
        <div class="section__header">
            <h1 class="h1-header align-center">Недвижимость</h1>
        </div>
        <div class="secton__content">
            <div class="main-catalog">
                <div class="row">
                    @foreach ($catalog as $product)
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
                {{ $catalog->onEachSide(2)->links('adfm::public.pagination') }}
            </div>
        </div>
    </div>
</section>
@include('adfm::public.feedback-section')
@endsection