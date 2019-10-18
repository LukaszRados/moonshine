<footer class='footer'>
    <ul class='footer__nav'>
        <li><a href='{{ route('posts.index') }}' class='footer__item'>{{ __('navigation.blog') }}</a></li>
        <li><a href='{{ route('crew') }}' class='footer__item'>{{ __('navigation.crew') }}</a></li>
        <li><a href='{{ route('boat') }}' class='footer__item'>{{ __('navigation.boat') }}</a></li>
        {{-- <li><a href='#' class='footer__item'>{{ __('navigation.route') }}</a></li> --}}
        <li><a href='{{ route('contact') }}' class='footer__item'>{{ __('navigation.contact') }}</a></li>
    </ul>
    <ul class='footer__nav footer__nav-social'>
        <li><a href='https://www.facebook.com/sailingmoonshine/' class='footer__item'><img src='{{ asset('img/social/fb.png') }}' alt='Moonshine @ Facebook' width='20'></a></li>
        <li><a href='https://instagram.com/sailingmoonshine' class='footer__item'><img src='{{ asset('img/social/ig.png') }}' alt='Moonshine @ Instagram' width='20'></a></li>
        {{-- <li><a href='#' class='footer__item'><img src='{{ asset('img/social/yt.png') }}' alt='Moonshine @ Youtube' width='20'></a></li> --}}
    </ul>
</footer>
