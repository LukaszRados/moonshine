@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Add post</h1>
    <ul class='header__actions'>
        <li>
            <button type='button' class='button button--secondary js-preview'>
                Preview
            </button>
        </li>
    </ul>
</header>
<form action='{{ route('admin.posts.index') }}' method='POST' class='form'>
    @csrf
    <div class='form__field'>
        <label class='form__label' for='title'>* Title</label>
        <input type='text' class='form__text form__text--large' id='title' required>
    </div>
    <div class='form__field'>
        <label class='form__label' for='description'>* Description (for SEO)</label>
        <input type='text' class='form__text' id='description' required>
    </div>
    <div class='form__field'>
        <label class='form__label' for='keywords'>Keywords (for SEO, comma separated)</label>
        <input type='text' class='form__text' id='keywords'>
    </div>
    <div class='form__field'>
        <label class='form__label' for='content'>Content (markdown)</label>
        <textarea class='form__text form__markdown js-uploader' id='content' placeholder='You can drag and drop images here'></textarea>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection