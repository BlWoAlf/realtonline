@extends('adfm::public.layout')
@section('meta-title', $page->title)
@section('content')
@if ($page->id == 1)
    @include('adfm::public.about-banner')
@endif
    <section class="section section__about-page">
        <div class="container">
            <div class="section__header">
                <h1 class="h1-header align-center">{{$page->title}}</h1>
            </div>
            <div class="section__content">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
