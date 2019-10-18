<div class='subheader'>
    <h2>{{ __('pages.posts.recent') }}</h2>
</div>

<div class='recent-articles'>
    @foreach ($posts as $post)
        <div class='recent-article'>
            {{ $post['title'] }}
        </div>
    @endforeach
</div>
