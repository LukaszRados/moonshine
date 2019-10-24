@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Points</h1>
    <ul class='header__actions'>
        <li><a href='{{ route('admin.points.create') }}' class='button'>Add point</a></li>
    </ul>
</header>
@endsection