@extends('layouts.app')

@section('meta.title') {{ __('pages.boat.title') }} - @stop
@section('meta.description') {{ __('pages.boat.description') }} @stop
@section('meta.keywords') {{ __('pages.boat.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/bg/boat.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.boat.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

@include('partials.boat_specs', [ 'include_description' => 1 ])

<div class='content'>
    <img src='{{ asset('img/moonshine.jpg') }}' alt='s/y Moonshine' class='content__photo'>
    @foreach (__('pages.boat.content') as $row)
        <p>{{ $row }}</p>
    @endforeach
</div>

@endsection