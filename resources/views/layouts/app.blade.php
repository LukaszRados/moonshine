<!DOCTYPE html>
<html lang='{{ config()->get('locale') }}'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no'>

        <title>@yield('meta.title') {{ __('messages.page_title') }}</title>
        <meta name='description' content='@yield('meta.description')'>
        <meta name='keywords' content='@yield('meta.keywords')'>

        <meta property='og:url' content='{{ url()->current() }}'>
        <meta property='og:title' content='@yield('meta.title')'>
        <meta property='og:description' content='@yield('meta.description')'>
        {{-- <meta property='og:image' content='@section('meta.facebook.image'){{ asset('img/facebook.jpg') }}@show'> --}}

        {{-- <link rel='icon' type='image/png' href='{{ asset('img/favicon/96x96.png') }}' sizes='96x96'> --}}
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|PT+Serif:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">

        <link rel='stylesheet' href='{{ asset(mix('css/app.css')) }}'>
        <base href='{{ url('/') }}'>
        @yield('css')
    </head>

    <body>
        @yield('body')

        {{-- @include('partials.newsletter') --}}
        @include('partials.footer')
    </body>

    <script src='{{ asset(mix('js/shared.js')) }}' async></script>
    @yield('javascript')
</html>