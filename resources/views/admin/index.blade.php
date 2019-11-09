@extends('layouts.admin')

@section('body')
<header class='header'>
    <h1>Variables</h1>
</header>
<form action='#' method='POST' class='form'>
    @csrf
</form>
@endsection