@extends('layouts.login')

@section('body')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    <input type="password" name="password" required autocomplete="current-password">
    <button type="submit">Login</button>
</form>
@endsection
