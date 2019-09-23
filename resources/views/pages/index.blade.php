@extends('layouts.app')

@section('body')

<header class='hero hero--full' style='background-image: url({{ asset('img/test.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('pages.index.header.yacht') }}</p>
        <h1 class='hero__header'>{{ __('pages.index.header.name') }}</h1>
        <p class='hero__body'>{{ __('pages.index.header.body') }}</p>
    </div>
    <div class='hero__footer'></div>
</header>

@include('partials.boat_specs', [ 'include_link' => 1 ])

<div class='home-crew'>
    <div class='home-crew__photo'>
        <img src='{{ asset('img/crew.jpg') }}' alt='{{ __('pages.index.crew.header') }}'>
    </div>
    <div class='home-crew__text'>
        <div class='home-crew__content'>
            <p class='home-crew__header'>{{ __('pages.index.crew.header') }}</p>
            <h2 class='home-crew__names'>{!! __('pages.index.crew.names') !!}</h2>
            <p class='home-crew__body'>{{ __('pages.index.crew.body') }}</p>
            <p class='home-crew__more'>
                <a href='{{ route('crew') }}'>{{ __('pages.index.crew.link') }}</a>
            </p>
        </div>
    </div>
</div>

@endsection