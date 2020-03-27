@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Add point</h1>
</header>
<form action='{{ route('admin.points.index') }}' method='POST' class='form'>
    @csrf
    <div class='form__field form__field--coordinate'>
        <label class='form__label' for='lat_degrees'>* Latitude</label>
        <div class='js-coordinates'>
            <input name='lat_degrees' type='text' class='form__text form__text--number' placeholder='00' id='lat_degrees' required autocomplete='false'> &deg;
            <input name='lat_minutes' type='text' class='form__text form__text--number' placeholder='00' required autocomplete='false'> &acute;
            <input name='lat_seconds' type='text' class='form__text form__text--number' placeholder='000' autocomplete='false'>
            <select name='lat_direction' class='form__text form__text--number'>
                <option value='N' selected>N</option>
                <option value='S'>S</option>
            </select>
            <input name='lat' type='hidden' class='js-result'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng_degrees'>* Longitude</label>
        <div class='js-coordinates'>
            <input name='lng_degrees' type='text' class='form__text form__text--number' placeholder='00' id='lng_degrees' required autocomplete='false'> &deg;
            <input name='lng_minutes' type='text' class='form__text form__text--number' placeholder='00' required autocomplete='false'> &acute;
            <input name='lng_seconds' type='text' class='form__text form__text--number' placeholder='000' autocomplete='false'>
            <select name='lng_direction' class='form__text form__text--number'>
                <option value='W' selected>W</option>
                <option value='E'>E</option>
            </select>
            <input name='lng' type='hidden' class='js-result'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='location_pl'>Location (PL)</label>
        <input name='location_pl' type='text' class='form__text' id='location_pl' autocomplete='false'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='location_en'>Location (EN)</label>
        <input name='location_en' type='text' class='form__text' id='location_en' autocomplete='false'>
    </div>
    <div class='form__field form__field--miles'>
        <label class='form__label' for='miles_new'>Miles</label>
        <div class='js-miles'>
            <input name='miles_old' type='text' class='form__text form__text--number' id='miles_exist' autocomplete='false' value='{{ $miles }}'> +
            <input name='miles_new' type='text' class='form__text form__text--number' id='miles_new' autocomplete='false'> = 
            <input name='miles' type='text' class='form__text form__text--number' id='miles' autocomplete='false'>
        </div>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection