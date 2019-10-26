@extends('layouts.app')

@section('meta.title') {{ __('pages.posts.title') }} - @stop
@section('meta.description') {{ __('pages.posts.description') }} @stop
@section('meta.keywords') {{ __('pages.posts.keywords') }} @stop

@section('css')
<style type='text/css'>
    .hero {
        background-image: url({{ asset('img/bg/blog.jpg') }})
    }
    @media screen and (min-width: 700px) {
        .hero {
            background-image: url({{ asset('img/bg/blog.jpg') }})
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
        <h1 class='hero__header hero__header--outline'>{{ __('pages.posts.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<div class='subheader'>
    <h2>{{ __('pages.posts.recent') }}</h2>
</div>

<div class='posts'>
    @foreach ($posts as $post)
        <article class='post-thumb'>
            <div class='post-thumb__photo'>
                <a href='{{ route('posts.show', $post['slug']) }}'>
                    <img src='{{ $post['thumb'] }}' alt='{{ $post['title'] }}'>
                </a>
            </div>
            <div class='post-thumb__text'>
                <p class='post-thumb__date'>{{ $post['published_text'] }}</p>
                <h2><a href='{{ route('posts.show', $post['slug']) }}'>{{ $post['title'] }}</a></h2>
                <p class='post-thumb__intro'>{{ $post['intro'] }}</p>
                <p class='post-thumb__more'><a href='{{ route('posts.show', $post['slug']) }}'>{{ __('messages.read_more') }}</a></p>
            </div>
        </article>
    @endforeach
</div>

@endsection