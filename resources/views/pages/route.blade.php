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

<div class='contact contact--no-margin'>
    <div class='contact__head'>
        <h2 class='contact__position-header'>{{ __('pages.contact.position.header') }}</h2>
        <p class='contact__position-current'>
            {!! __('pages.contact.position.position') !!}<br>
            {{ __('pages.contact.position.city') }}
        </p>
        <p class='contact__position-updated'>
            {{ __('pages.contact.position.last_updated') }}: {{ __('pages.contact.position.date') }}.
        </p>
    </div>
</div>

<div class='map-wrapper'>
    <div class='map js-map' data-marker='{{ asset('img/marker.png') }}' data-marker-small='{{ asset('img/marker_small.png') }}'></div>
</div>

@endsection

@section('javascript')
<script>
window.points = [
    { 
        lat: 51.624999, 
        lng: 0.804172, 
        options: {
            title: 'Burnham on Crouch',
            text: 'Kupno i remont jachtu',
        }
    },
    {
        lat: 51.626757,
        lng: 0.968287,
    },
    {
        lat: 51.378313, 
        lng: 1.497771,
    },
    {
        lat: 51.326830, 
        lng: 1.432350,
    },
    {
        lat: 51.155182, 
        lng: 1.423848,
    },
    {
        lat: 51.118039, 
        lng: 1.324246,
    },
    {
        lat: 50.728990, 
        lng: 1.592186,
        options: {
            title: 'Aktualna pozycja',
            text: 'Boulogne-sur-Mer, Francja'
        }
    },
];
</script>
<script src='{{ asset(mix('js/map.js')) }}'></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap" async defer></script>
@endsection
