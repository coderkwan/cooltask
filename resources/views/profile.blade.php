@extends('layout.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column align-items-center text-center gap-3">
            <h1>Hello <span class="fw-bold">{{ $data->name }}</span> welcome to your profile.</h1>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-secondary rounded-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#editAccountModal" data-id="{{ $data->id }}" data-name="{{ $data->name }}"
                    data-email="{{ $data->email }}">Update
                    Profile</button>
                <a href="/logout" class="btn btn-secondary">Logout</a>
                <button class="btn btn-outline-danger rounded-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#deleteAccountModal">Delete Account</button>
            </div>
        </div>
    </div>
    @include('modals.profilemodals')
@endsection
