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
            <input name='lat_direction' type='text' class='form__text form__text--number' placeholder='N/S' value='N'>
            <input name='lat' type='hidden' class='js-result'>
        </div>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng_degrees'>* Longitude</label>
        <div class='js-coordinates'>
            <input name='lng_degrees' type='text' class='form__text form__text--number' placeholder='00' id='lng_degrees' required autocomplete='false'> &deg;
            <input name='lng_minutes' type='text' class='form__text form__text--number' placeholder='00' required autocomplete='false'> &acute;
            <input name='lng_seconds' type='text' class='form__text form__text--number' placeholder='000' autocomplete='false'>
            <input name='lng_direction' type='text' class='form__text form__text--number' placeholder='E/W' value='W'>
            <input name='lng' type='hidden' class='js-result'>
        </div>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection