@extends('layouts.app')

@section('meta.title') {{ __('pages.crew.title') }} - @stop
@section('meta.description') {{ __('pages.crew.description') }} @stop
@section('meta.keywords') {{ __('pages.crew.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/bg/crew.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>s/y Moonshine</p>
        <h1 class='hero__header'>{{ __('pages.crew.title') }}</h1>
    </div>
    <div class='hero__footer'>
        <img src='{{ asset('img/scroll.png') }}' alt='' role='presentation' width='16' height='27'>
    </div>
</header>

Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum<br>
Lorem ipsum

@endsection