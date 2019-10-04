@extends('layouts.login')

@section('body')
<form method="POST" action="{{ route('login') }}">
    <h1>Login</h1>
    @csrf
    <label>
        Username:
        <input type="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    </label>
    <label>
        Password:
        <input type="password" name="password" required autocomplete="current-password">
    </label>
    <button type="submit">Login</button>
</form>
@endsection
