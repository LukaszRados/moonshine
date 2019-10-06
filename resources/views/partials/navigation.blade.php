<div class='navigation js-nav'>
    <div class='navigation__left'>
        <ul class='navigation__social'>
            <li><a href='https://www.facebook.com/sailingmoonshine/'><img src='{{ asset('img/social/fb.png') }}' alt='Moonshine @ Facebook' width='20'></a></li>
            <li><a href='https://instagram.com/sailingmoonshine'><img src='{{ asset('img/social/ig.png') }}' alt='Moonshine @ Instagram' width='20'></a></li>
            {{-- <li><a href='#'><img src='{{ asset('img/social/yt.png') }}' alt='Moonshine @ Youtube' width='20'></a></li> --}}
        </ul>
        @if (config()->get('locale') == 'en')
            <a href='{{ url(preg_replace('/^en/', '', request()->path())) }}' class='navigation__language' lang='pl'>Polski?</a>
        @else
            <a href='{{ url('en/'.request()->path()) }}' class='navigation__language' lang='en'>English?</a>
        @endif
    </div>
    <div class='navigation__logo'>
        <a href='{{ route('home') }}' style='background-image: url({{ asset('img/logo.png') }})'>
            Moonshine
        </a>
    </div>
    <div class='navigation__right'>
        <button type='button' class='navigation__toggle js-nav-toggle'>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='15' viewBox='0 0 35 22'><g transform='translate(-603.5 -59.5)'><line x2='31' transform='translate(605.5 61.5)' /><line x2='31' transform='translate(605.5 70.5)' /><line x2='31' transform='translate(605.5 79.5)' /></g></svg>
        </button>
        <ul class='navigation__list'>
            {{-- <li><a href='#'>{{ __('navigation.blog') }}</a></li> --}}
            <li><a href='{{ route('crew') }}'>{{ __('navigation.crew') }}</a></li>
            <li><a href='{{ route('boat') }}'>{{ __('navigation.boat') }}</a></li>
            {{-- <li><a href='#'>{{ __('navigation.route') }}</a></li> --}}
            <li><a href='{{ route('contact') }}'>{{ __('navigation.contact') }}</a></li>
        </ul>
    </div>
</div>
