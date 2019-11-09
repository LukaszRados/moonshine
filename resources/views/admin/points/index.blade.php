@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Points</h1>
    <ul class='header__actions'>
        <li><a href='{{ route('admin.points.create') }}' class='button'>Add point</a></li>
    </ul>
</header>

<table class='table'>
    <tr>
        <th>Coordinates</th>
        <th>Date and time</th>
        <th>Options</th>
    </tr>
    @foreach ($points as $point)
        <tr>
            <td>{{ $point->lat }}, {{ $point->lng }} @if ($point->location_pl) ({{ $point->location_pl }}) @endif </td>
            <td>{{ date('Y-m-d, H:m', strtotime($point->created_at)) }}</td>
            <td><a href='{{ route('admin.points.edit', $point->id) }}' class='button'>Edit</a></td>
        </tr>
    @endforeach
</table>
@endsection