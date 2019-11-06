@extends('layouts.app')

@section('meta.title') {{ $post['title'] }} - {{ __('pages.posts.title') }} - @stop
@section('meta.description') {{ __('pages.posts.description') }} @stop
@section('meta.keywords') {{ __('pages.posts.keywords') }} @stop
@section('meta.facebook.image'){{ $post['facebook'] }} @stop

@section('body')

<header class='hero hero--post' style='background-image: url({{ $post['background'] }})'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ $post['published_text'] }}</p>
        <h1 class='hero__header'>{{ $post['title'] }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<article class='post'>
    @foreach ($post['body'] as $element)
        @if ($element['type'] === 'markdown')
            <div class='post__text'>
                {!! $element['content'] !!}
            </div>
        @elseif ($element['type'] === 'photo')
            <div class='post__photo'>
                <div
                    class='post__photo-placeholder'
                    style='padding-bottom: {{ $element['aspect_ratio'] }}%'
                >
                    <img
                        src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVQYV2NgYAAAAAMAAWgmWQ0AAAAASUVORK5CYII='
                        alt='{{ $element['alt'] }}'
                        class='js-lazy-photo'
                        data-src='{{ $element['src'] }}'
                    >
                </div>
                @if (array_key_exists('title', $element))
                    <p class='post__photo-title'>{{ $element['title'] }}</p>
                @endif
            </div>
        @elseif ($element['type'] === 'video')
            <div class='post__video'>
                <iframe src='{{ $element['src'] }}' frameborder='0' allowfullscreen></iframe>
            </div>
        @endif
    @endforeach
    <p class='post__posted'>{{ $post['location'] }}, {{ $post['published_text'] }}</p>
</article>

{{-- @if ($previews->count() > 2)
    @include('partials.recent_posts', [ 'posts' => $previews, 'title' => __('pages.index.recent_posts') ])
@endif --}}

@endsection

@section('javascript')
<script src='{{ asset(mix('js/blog.js')) }}'></script>
@endsection