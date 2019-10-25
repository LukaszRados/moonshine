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
            {{ $coordinates }}<br>
            {{ __('pages.contact.position.city') }}
        </p>
        <p class='contact__position-updated'>
            {{ __('pages.contact.position.last_updated') }}: {{ date('Y-m-d, H:m', strtotime($current_position->created_at)) }}.
        </p>
    </div>
</div>

<div class='map-wrapper'>
    <div
        class='map js-map'
        data-marker='{{ asset('img/marker.png') }}'
        data-marker-small='{{ asset('img/marker_small.png') }}'
        data-current-location-date='{{ date('Y-m-d, H:m', strtotime($current_position->created_at)) }}'
        data-current-location-place='{{ __('pages.contact.position.city') }}'
    ></div>
</div>

@endsection

@section('javascript')
<script>
    window.points = @json($points);
</script>
<script src='{{ asset(mix('js/map.js')) }}'></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap" async defer></script>
@endsection
