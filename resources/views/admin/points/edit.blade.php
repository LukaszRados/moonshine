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
            <select name='lat_direction' class='form__text form__text--number'>
                <option value='N' @if ($lat['direction'] === 'N') selected @endif>N</option>
                <option value='S' @if ($lat['direction'] === 'S') selected @endif>S</option>
            </select>
            <input name='lat' type='hidden' class='js-result' value='{{ $point->lat }}'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng'>* Longitude</label>
        <div class='js-coordinates'>
            <input name='lng_degrees' type='text' class='form__text form__text--number' value='{{ $lng['degrees'] }}' placeholder='000' id='lng_degrees' required> &deg;
            <input name='lng_minutes' type='text' class='form__text form__text--number' value='{{ $lng['minutes'] }}' placeholder='00' required> &acute;
            <input name='lng_seconds' type='text' class='form__text form__text--number' value='{{ $lng['seconds'] }}' placeholder='000'>
            <select name='lng_direction' class='form__text form__text--number'>
                <option value='W' @if ($lng['direction'] === 'W') selected @endif>W</option>
                <option value='E' @if ($lng['direction'] === 'E') selected @endif>E</option>
            </select>
            <input name='lng' type='hidden' class='js-result' value='{{ $point->lng }}'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='location_pl'>Location (PL)</label>
        <input name='location_pl' type='text' class='form__text' id='location_pl' autocomplete='false' value='{{ old('location_pl', $point->location_pl) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='location_en'>Location (EN)</label>
        <input name='location_en' type='text' class='form__text' id='location_en' autocomplete='false' value='{{ old('location_en', $point->location_en) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='miles'>Miles</label>
        <input name='miles' type='text' class='form__text' id='miles' autocomplete='false' value='{{ old('miles', $point->miles) }}'>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection