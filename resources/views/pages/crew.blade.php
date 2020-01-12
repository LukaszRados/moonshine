@extends('layouts.app')

@section('meta.title') {{ __('pages.crew.title') }} - @stop
@section('meta.description') {{ __('pages.crew.description') }} @stop
@section('meta.keywords') {{ __('pages.crew.keywords') }} @stop

@section('css')
    @include('partials.background_css', ['page' => 'crew'])
@endsection

@section('body')

<header class='hero'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.crew.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<article class='post'>
    <div class='post__text'>
        <h2>{!! __('pages.crew.names') !!}</h2>

        @foreach (__('pages.crew.above_photo') as $row)
            <p>{{ $row }}</p>
        @endforeach
    </div>
    
    <div class='post__video'>
        <iframe src='https://www.youtube-nocookie.com/embed/2CA9TbXGKQI' frameborder='0' allowfullscreen></iframe>
    </div>
    
    <div class='post__text'>
        @foreach (__('pages.crew.below_photo') as $row)
            <p>{{ $row }}</p>
        @endforeach
    </div>

    <div class='post__photo'>
        <div
            class='post__photo-placeholder'
            style='padding-bottom: 56.25%'
        >
            <img
                src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQYV2NgYAAAAAMAAWgmWQ0AAAAASUVORK5CYII='
                alt='{{ __('pages.crew.photo_alt') }}'
                class='js-lazy-photo'
                data-src='{{ asset('img/crew.jpg') }}'
            >
        </div>
    </div>
</article>

@endsection

@section('javascript')
<script src='{{ asset(mix('js/blog.js')) }}'></script>
@endsection
