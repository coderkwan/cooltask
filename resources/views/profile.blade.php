@extends('layout.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column align-items-center gap-3">
            <h1>Hello <span class="fw-bold">{{ $data->name }}</span> welcome to your profile.</h1>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-secondary" href="/logout">Edit Profile</button>
                <a class="btn btn-secondary" href="/logout">Logout</a>
            </div>
            <button class="btn btn-outline-danger" type="button">Delete Account</button>
        </div>
    </div>
@endsection
