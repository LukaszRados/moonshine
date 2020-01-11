@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Add video</h1>
</header>
<form action='{{ route('admin.videos.index') }}' method='POST' class='form' enctype='multipart/form-data'>
    @csrf
    <div class='form__field'>
        <label class='form__label' for='url'>URL (embed)</label>
        <input name='url' type='text' class='form__text' id='url' autocomplete='false'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='slug'>Slug</label>
        <input name='slug' type='text' class='form__text' id='slug' autocomplete='false'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='photo'>Cover photo</label>
        <input name='photo' type='file' id='photo'>
    </div>

    <h2>Polish</h2>
    <div class='form__field'>
        <label class='form__label' for='title_pl'>Title</label>
        <input name='title_pl' type='text' class='form__text' id='title_pl' autocomplete='false'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='description_pl'>Description</label>
        <textarea name='description_pl' class='form__text' id='description_pl'></textarea>
    </div>

    <h2>English</h2>
    <div class='form__field'>
        <label class='form__label' for='title_en'>Title</label>
        <input name='title_en' type='text' class='form__text' id='title_en' autocomplete='false'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='description_en'>Description</label>
        <textarea name='description_en' class='form__text' id='description_en'></textarea>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection