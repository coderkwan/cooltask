@extends('layout.layout')

@section('content')

<div class="d-flex justify-content-center">
    <div style="max-width: 400px; width:100%;">
        <form action="{{ route('submit_login') }}" method="POST" class="w-100 d-flex flex-column gap-3">
            @csrf
            @method("POST")
            <div class="d-flex flex-column gap-2">
                <label for="email">Email</label>
                <input required type="email" name="email" placeholder="john@doe.com" value="{{ old('email')}}" class="form-control">
            </div>
            <div class="d-flex flex-column gap-2">
                <label for="password">Password</label>
                <input required type="password" name="password" placeholder="********" value="{{ old('password')}}" class="form-control">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <a class="d-block" href="/forgot">Forgot password</a>
            <p>Don't have an account? <a href="/register">Register.</a></p>
        </form>
    </div>
</div>
    
@endsection