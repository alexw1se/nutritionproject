@extends('layouts.app')

@section('content')
<h2>Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" class="form-control" required autofocus>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
</form>

<div class="mt-3">
    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
</div>
<div class="mt-3">
    <a href="{{ route('register') }}">Don't have an account? Register</a>
</div>
@endsection
