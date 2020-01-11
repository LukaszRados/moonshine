<div class='subheader'>
    <h2>{{ $title }}</h2>
</div>

<div class='recent-posts'>
    @foreach ($videos as $video)
        <div class='recent-post'>
            <a href='{{ route('posts.show', $video['slug']) }}' class='recent-post__photo'>
                <img src='{{ $video['thumb'] }}' alt='{{ $video['title'] }}'>
            </a>
            <div class='recent-post__text'>
                <h3><a href='{{ route('posts.show', $video['slug']) }}'>{{ $video['title'] }}</a></h3>
                <p class='recent-post__intro'>{{ $video['intro'] }}</p>
                <p class='recent-post__more'><a href='{{ route('videos.show', $video['slug']) }}'>{{ __('messages.see_video') }}</a></p>
            </div>
        </div>
    @endforeach
</div>
