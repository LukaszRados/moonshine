@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Edit video</h1>
    <ul class='header__actions'>
        <li>
            <form action='{{ route('admin.videos.destroy', $video->id) }}' method='POST'>
                @csrf
                <input type='hidden' name='_method' value='DELETE'>
                <button type='submit' class='button button--danger'>Delete</a>
            </form>
        </li>
    </ul>
</header>
<form action='{{ route('admin.videos.update', $video->id) }}' method='POST' class='form' enctype='multipart/form-data'>
    @csrf
    <input type='hidden' name='_method' value='PUT'>
    <div class='form__field'>
        <label class='form__label'>
            <input type='checkbox' name='is_published' value='1' @if($video->is_published) checked @endif>
            Is published?
        </label>
    </div>
    <div class='form__field'>
        <label class='form__label' for='url'>URL (embed)</label>
        <input name='url' type='text' class='form__text' id='url' autocomplete='false' value='{{ old('url', $video->url) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='slug'>Slug</label>
        <input name='slug' type='text' class='form__text' id='slug' autocomplete='false' disabled value='{{ old('url', $video->slug) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='photo'>Cover photo</label>
        <input name='photo' type='file' id='photo'>
    </div>

    <h2>Polish</h2>
    <div class='form__field'>
        <label class='form__label' for='title_pl'>Title</label>
        <input name='title_pl' type='text' class='form__text' id='title_pl' autocomplete='false' value='{{ old('title_pl', $video->title_pl) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='description_pl'>Description</label>
        <textarea name='description_pl' class='form__text' id='description_pl'>{{ old('description_pl', $video->description_pl) }}</textarea>
    </div>

    <h2>English</h2>
    <div class='form__field'>
        <label class='form__label' for='title_en'>Title</label>
        <input name='title_en' type='text' class='form__text' id='title_en' autocomplete='false' value='{{ old('title_en', $video->title_en) }}'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='description_en'>Description</label>
        <textarea name='description_en' class='form__text' id='description_en'>{{ old('description_en', $video->description_en) }}</textarea>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection
