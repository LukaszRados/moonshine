<div class='subheader'>
    <h2>{{ $title }}</h2>
</div>

<div class='recent-posts'>
    @foreach ($videos as $video)
        <div class='recent-post'>
            <a href='{{ route('videos.show', $video['slug']) }}' class='recent-post__photo'>
                <img src='{{ $video['photo'] }}' alt='{{ $video['title'] }}'>
                <h3>{{ $video['title'] }}</h3>
            </a>
        </div>
    @endforeach
</div>
