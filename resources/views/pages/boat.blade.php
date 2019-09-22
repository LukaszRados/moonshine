@extends('layouts.app')

@section('meta.title') {{ __('pages.boat.title') }} - @stop
@section('meta.description') {{ __('pages.boat.description') }} @stop
@section('meta.keywords') {{ __('pages.boat.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/test.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>s/y Moonshine</p>
        <h1 class='hero__header'>{{ __('pages.boat.title') }}</h1>
    </div>
    <div class='hero__footer'>
        <img src='{{ asset('img/scroll.png') }}' alt='' role='presentation' width='16' height='27'>
    </div>
</header>

@include('partials.boat')

@endsection