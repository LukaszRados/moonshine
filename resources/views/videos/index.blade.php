@extends('layouts.app')

@section('meta.title') {{ __('pages.videos.title') }} - @stop
@section('meta.description') {{ __('pages.videos.description') }} @stop
@section('meta.keywords') {{ __('pages.videos.keywords') }} @stop

@section('css')
<style type='text/css'>
    .hero {
        background-image: url({{ asset('img/bg/videos-mobile.jpg') }})
    }
    @media screen and (min-width: 700px) {
        .hero {
            background-image: url({{ asset('img/bg/videos.jpg') }})
        }
    }
</style>
@endsection

@section('body')

<header class='hero'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.videos.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

@include('partials.recent_videos', [ 'videos' => $videos, 'title' => __('pages.index.recent_videos') ])

@endsection