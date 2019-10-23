@extends('layouts.app')

@section('meta.title') {{ __('pages.route.title') }} - @stop
@section('meta.description') {{ __('pages.route.description') }} @stop
@section('meta.keywords') {{ __('pages.route.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/bg/route.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.route.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<div class='content'>

    Mapa

</div>

@endsection