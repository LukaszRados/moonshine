<nav class='navigation'>
    <div class='navigation__title'>Admin<br>Panel</div>
    <button class='navigation__toggle js-nav-toggle'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='15' viewBox='0 0 35 22'><g transform='translate(-603.5 -59.5)'><line x2='31' transform='translate(605.5 61.5)' /><line x2='31' transform='translate(605.5 70.5)' /><line x2='31' transform='translate(605.5 79.5)' /></g></svg>
    </button>
    <ul class='navigation__list js-nav'>
        <li>
            <a href='{{ route('admin.dashboard') }}'>Dashboard</a>
        </li>
        {{-- <li class='navigation__separator'></li> --}}
        {{-- <li>
            <a href='{{ route('admin.posts.index') }}'>Blog</a>
        </li> --}}
        <li>
            <a href='{{ route('admin.points.index') }}'>Route</a>
        </li>
        <li class='navigation__separator'></li>
        <li>
            <a href='{{ route('logout') }}'>Logout</a>
        </li>
    </ul>
</nav>
