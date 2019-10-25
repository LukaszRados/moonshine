@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Edit point</h1>
    <ul class='header__actions'>
        <li>
            <form action='{{ route('admin.points.destroy', $point->id) }}' method='POST'>
                @csrf
                <input type='hidden' name='_method' value='DELETE'>
                <button type='submit' class='button button--danger'>Delete</a>
            </form>
        </li>
    </ul>
</header>
<form action='{{ route('admin.points.update', $point->id) }}' method='POST' class='form'>
    @csrf
    <input type='hidden' name='_method' value='PUT'>
    <h2>Coordinates</h2>
    <div class='form__field'>
        <label class='form__label' for='lat'>* Latitude</label>
        <div class='js-coordinates'>
            <input name='lat_degrees' type='text' class='form__text form__text--number' value='{{ $lat['degrees'] }}' placeholder='00' id='lat_degrees' required> &deg;
            <input name='lat_minutes' type='text' class='form__text form__text--number' value='{{ $lat['minutes'] }}' placeholder='00' required> &acute;
            <input name='lat_seconds' type='text' class='form__text form__text--number' value='{{ $lat['seconds'] }}' placeholder='000'>
            <input name='lat_direction' type='text' class='form__text form__text--number' placeholder='N/S' value='{{ $lat['direction'] }}'>
            <input name='lat' type='hidden' class='js-result' value='{{ $point->lat }}'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng'>* Longitude</label>
        <div class='js-coordinates'>
            <input name='lng_degrees' type='text' class='form__text form__text--number' value='{{ $lng['degrees'] }}' placeholder='000' id='lng_degrees' required> &deg;
            <input name='lng_minutes' type='text' class='form__text form__text--number' value='{{ $lng['minutes'] }}' placeholder='00' required> &acute;
            <input name='lng_seconds' type='text' class='form__text form__text--number' value='{{ $lng['seconds'] }}' placeholder='000'>
            <input name='lng_direction' type='text' class='form__text form__text--number' placeholder='N/S' value='{{ $lng['direction'] }}'>
            <input name='lng' type='hidden' class='js-result' value='{{ $point->lng }}'>
        </div>
    </div>
    {{-- <h2>Point description</h2>
    <div class='form__field'>
        <label class='form__label' for='title'>Title</label>
        <input name='title' type='text' class='form__text form__text--large' id='title'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='content'>Text (markdown accepted)</label>
        <textarea name='content' class='form__text form__markdown' id='content'></textarea>
    </div>
    <div class='form__field'>
        <label class='form__label' for='url'>URL (start with http(s))</label>
        <input name='url' type='text' class='form__text' id='url'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='url_label'>URL label</label>
        <input name='url_label' type='text' class='form__text' id='url_label'>
    </div> --}}
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection