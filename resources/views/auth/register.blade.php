@extends('layout.layout')

@section('content')

<div>
    <form action="{{ route('submit_register') }}" method="POST">
        @csrf
        @method("POST")
        <div>
            <label for="email">Full name</label>
            <input type="name" name="name" placeholder="John Doe">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="john@doe.com">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="******">
        </div>
        <button type="submit" class="">Register</button>
        <p>Already have an account? <a href="/login">Login.</a></p>
    </form>
</div>
    
@endsection