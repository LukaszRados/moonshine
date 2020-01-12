@extends('layouts.app')

@section('meta.title') {{ __('pages.contact.title') }} - @stop
@section('meta.description') {{ __('pages.contact.description') }} @stop
@section('meta.keywords') {{ __('pages.contact.keywords') }} @stop

@section('css')
    @include('partials.background_css', ['page' => 'contact'])
@endsection

@section('body')

<header class='hero'>
    <div class='hero__navigation'>
        @include('partials.navigation')
    </div>
    <div class='hero__content'>
        <p class='hero__intro'>{{ __('messages.page_title_shorter') }}</p>
        <h1 class='hero__header hero__header--outline'>{{ __('pages.contact.title') }}</h1>
    </div>
    <div class='hero__footer'></div>
</header>

<div class='contact'>
    <div class='contact__head'>
        <h2 class='contact__position-header'>{{ __('pages.contact.position.header') }}</h2>
        <p class='contact__position-current'>
            {{ $coordinates }}<br>
            {{ $current_position->location }}
        </p>
        <p class='contact__position-updated'>
            {{ __('pages.contact.position.last_updated') }}: {{ $current_position->date_formatted }}.
            <a href='{{ route('route') }}'>{{ __('pages.contact.position.see_map') }}</a>
        </p>
    </div>

    <table class='contact__table'>
        <tr>
            <td>E-mail</td>
            <td><a href='mailto:{{ __('pages.contact.email') }}'>{{ __('pages.contact.email') }}</a></td>
        </tr>
        <tr>
            <td>Instagram</td>
            <td><a href='https://instagram.com/sailingmoonshine'>@sailingmoonshine</a></td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td><a href='https://www.facebook.com/sailingmoonshine/'>Sailing Moonshine</a></td>
        </tr>
        <tr>
            <td>YouTube</td>
            <td><a href='https://www.youtube.com/channel/UCsElUkhG9KKmbtSKmMdIBAA'>Sailing Moonshine @ YT</a></td>
        </tr>
    </table>

    <div class='contact__visit'>
        <h3>{{ __('pages.contact.visit_us.header') }}</h3>
        <p>{{ __('pages.contact.visit_us.body') }}</p>
        <p><a href='mailto:{{ __('pages.contact.email') }}'>{{ __('pages.contact.visit_us.send_email') }}</a></p>
    </div>
</div>

@endsection