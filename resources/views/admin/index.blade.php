@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Variables</h1>
</header>
<form action='#' method='POST' class='form'>
    @csrf
    <div class='form__field'>
        <label class='form__label'><input type='checkbox' name='at_sea' value='1'> At sea?</label>
    </div>
    <div class='form__field'>
        <button class='button button--large'>
            Save
        </button>
    </div>
</form>
@endsection