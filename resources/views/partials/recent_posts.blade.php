<div class='subheader'>
    <h2>{{ $title }}</h2>
</div>

<div class='recent-posts'>
    @foreach ($posts as $post)
        <div class='recent-post'>
            <a href='{{ route('posts.show', $post['slug']) }}' class='recent-post__photo'>
                <img src='{{ $post['thumb'] }}' alt='{{ $post['title'] }}'>
            </a>
            <div class='recent-post__text'>
                <h3><a href='{{ route('posts.show', $post['slug']) }}'>{{ $post['title'] }}</a></h3>
                <p class='recent-post__intro'>{{ $post['intro'] }}</p>
                <p class='recent-post__more'><a href='{{ route('posts.show', $post['slug']) }}'>{{ __('messages.read_post') }}</a></p>
            </div>
        </div>
    @endforeach
</div>
