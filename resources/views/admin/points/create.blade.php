@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Add point</h1>
</header>
<form action='{{ route('admin.points.index') }}' method='POST' class='form'>
    @csrf
    <div class='form__field'>
        <label class='form__label' for='lat'>* Latitude (format: 21.35353)</label>
        <input name='lat' type='text' class='form__text' id='lat' required>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng'>* Longitude (format: 1.32535)</label>
        <input name='lng' type='text' class='form__text' id='lng' required>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection