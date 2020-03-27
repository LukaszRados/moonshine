@extends('layouts.app')

@section('meta.title') {{ $video['title'] }} - {{ __('pages.videos.title') }} - @stop
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

<header class='hero hero--full'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('pages.videos.title') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ $video['title'] }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<article class='post'>
    <div class='post__text'>
        <p>{!! nl2br($video['description']) !!}</p>
    </div>
    <div class='post__video'>
        <iframe src='{{ $video['url'] }}' frameborder='0' allowfullscreen></iframe>
    </div>
    <div class='post__text'>
        <p>{!! __('pages.videos.subscribe') !!}</p>
    </div>
</article>

@endsection
