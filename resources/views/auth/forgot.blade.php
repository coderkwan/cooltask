@extends('layout.layout')

@section('content')

<div>
    <form action="{{ route('submit_forgot') }}" method="POST">
        @csrf
        @method("POST")
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="john@doe.com">
        </div>
        <button type="submit" class="">Request Link</button>
        <p>Do you remember your password? <a href="/login">Login.</a></p>
    </form>
</div>
    
@endsection