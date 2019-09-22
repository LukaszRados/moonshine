@extends('layouts.app')

@section('body')

<header class='hero' style='background-image: url({{ asset('img/test.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>s/y Moonshine</p>
        <h1 class='hero__header'>The Yacht</h1>
    </div>
    <div class='hero__footer'>
        <img src='{{ asset('img/scroll.png') }}' alt='' role='presentation' width='16' height='27'>
    </div>
</header>

@include('partials.boat')

@endsection