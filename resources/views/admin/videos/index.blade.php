@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Videos</h1>
    <ul class='header__actions'>
        <li><a href='{{ route('admin.videos.create') }}' class='button'>Add video</a></li>
    </ul>
</header>

<table class='table'>
    <tr>
        <th>Title</th>
        <th>Options</th>
    </tr>
    @foreach ($videos as $video)
        <tr @if (!$video->is_published) style='opacity: .5' @endif>
            <td>{{ $video->title_pl }}</td>
            <td><a href='{{ route('admin.videos.edit', $video->id) }}' class='button'>Edit</a></td>
        </tr>
    @endforeach
</table>
@endsection