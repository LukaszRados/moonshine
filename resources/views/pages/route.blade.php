@extends('layouts.app')

@section('meta.title') {{ __('pages.route.title') }} - @stop
@section('meta.description') {{ __('pages.route.description') }} @stop
@section('meta.keywords') {{ __('pages.route.keywords') }} @stop

@section('css')
    @include('partials.background_css', ['page' => 'route'])
@endsection

@section('body')

<header class='hero'>
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
            {{ $current_position->location }}
        </p>
        <p class='contact__position-updated'>
            {{ __('pages.contact.position.last_updated') }}: {{ $current_position->date_formatted }}.
        </p>
    </div>

    <div class='stats'>
        <div class='stats__column'>
            <span class='stats__value'>{{ $miles }}</span>
            <span class='stats__text'>{{ __('pages.route.stats.miles') }}</span>
        </div>
        <div class='stats__column'>
            <span class='stats__value'>{{ $days }}</span>
            <span class='stats__text'>{{ __('pages.route.stats.days') }}</span>
        </div>
        <div class='stats__column'>
            <span class='stats__value'>{{ $videos->count() }}</span>
            <span class='stats__text'>{{ __('pages.route.stats.youtube') }}</span>
        </div>
    </div>
</div>

<div class='map-wrapper'>
    <div
        class='map js-map'
        data-marker='{{ asset('img/marker.png') }}'
        data-marker-small='{{ asset('img/marker_small.png') }}'
        data-marker-video='{{ asset('img/marker_video.png') }}'
        data-video-text='{{ __('messages.see_video') }}'
        data-current-location-date='{{ date('Y-m-d, H:m', strtotime($current_position->created_at)) }}'
        data-current-location-place='{{ $current_position->location }}'
    ></div>
</div>

@endsection

@section('javascript')
<script>
    window.points = @json($points);
    window.videos = @json($videos);
</script>
<script src='{{ asset(mix('js/map.js')) }}'></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap" async defer></script>
@endsection
