@extends('layouts.app')

@section('body')

<header class='hero hero--full' style='background-image: url({{ asset('img/test.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('pages.index.header_yacht') }}</p>
        <h1 class='hero__header'>{{ __('pages.index.header_name') }}</h1>
        <p class='hero__body'>{{ __('pages.index.body') }}</p>
    </div>
    <div class='hero__footer'></div>
</header>

@include('partials.boat_specs')

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