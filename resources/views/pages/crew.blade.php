@extends('layouts.app')

@section('meta.title') {{ __('pages.crew.title') }} - @stop
@section('meta.description') {{ __('pages.crew.description') }} @stop
@section('meta.keywords') {{ __('pages.crew.keywords') }} @stop

@section('css')
    @include('partials.background_css', ['page' => 'crew'])
@endsection

@section('body')

<header class='hero'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.crew.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>


<div class='content content--spaced crew'>
    <h2>{!! __('pages.crew.names') !!}</h2>
    @foreach (__('pages.crew.above_photo') as $row)
        <p>{{ $row }}</p>
    @endforeach
    
    <img src='{{ asset('img/crew.jpg') }}' alt='{{ __('pages.crew.photo_alt') }}' class='content__photo content__photo--crew'>

    @foreach (__('pages.crew.below_photo') as $row)
        <p>{{ $row }}</p>
    @endforeach


</div>

@endsection