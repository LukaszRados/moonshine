@extends('layouts.app')

@section('body')

<header class='hero' style='background-image: url({{ asset('img/bg/crew.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>s/y Moonshine</p>
        <h1 class='hero__header'>The Crew</h1>
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