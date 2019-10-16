@extends('layouts.app')

@section('meta.title') {{ __('pages.posts.title') }} - @stop
@section('meta.description') {{ __('pages.posts.description') }} @stop
@section('meta.keywords') {{ __('pages.posts.keywords') }} @stop

@section('body')

<header class='hero' style='background-image: url({{ asset('img/blog.jpg') }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header'>{{ __('pages.posts.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

@foreach ($posts as $post)
<a href='{{ route('posts.show', $post['slug']) }}'>{{ $post['title'] }}</a> <br>
@endforeach

@endsection