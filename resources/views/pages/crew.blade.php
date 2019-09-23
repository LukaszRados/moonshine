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
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header'>{{ __('pages.crew.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
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