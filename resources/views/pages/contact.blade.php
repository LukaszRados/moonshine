@extends('layouts.app')

@section('meta.title') {{ __('pages.contact.title') }} - @stop
@section('meta.description') {{ __('pages.contact.description') }} @stop
@section('meta.keywords') {{ __('pages.contact.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/test.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>s/y Moonshine</p>
        <h1 class='hero__header'>{{ __('pages.contact.title') }}</h1>
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