@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Edit point</h1>
</header>
<form action='{{ route('admin.points.update') }}' method='POST' class='form'>
    @csrf
    <h2>Coordinates</h2>
    <div class='form__field'>
        <label class='form__label' for='lat'>* Latitude (format: 21.35353)</label>
        <input name='lat' type='text' class='form__text' id='lat' required>
    </div>
    <div class='form__field'>
        <label class='form__label' for='lng'>* Longitude (format: 1.32535)</label>
        <input name='lng' type='text' class='form__text' id='lng' required>
    </div>
    <h2>Point description</h2>
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
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection