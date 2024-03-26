@extends('layout.layout')

@section('content')

<div>
    <form action="{{ route('submit_login') }}" method="POST">
        @csrf
        @method("POST")
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="john@doe.com">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="******">
        </div>
        <button type="submit" class="">Login</button>
        <a href="/forgot">Forgot password</a>
        <p>Don't have an account? <a href="/register">Register.</a></p>
    </form>
</div>
    
@endsection