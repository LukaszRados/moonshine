@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Posts</h1>
    <ul class='header__actions'>
        <li><a href='{{ route('admin.posts.create') }}' class='button'>Add post</a></li>
    </ul>
</header>
@endsection