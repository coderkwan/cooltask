@extends('layout.layout')
@section('content')
    <div>
        <div class="d-flex justify-content-between my-4">
            <div>
                <button class="btn border bg-success text-white">ALL</button>
                <button class="btn border">TODO</button>
                <button class="btn border">PENDING</button>
                <button class="btn border">COMPLETE</button>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#createModal">+ Create a
                    new Task</button>
            </div>
        </div>
        <div class="d-flex gap-3">
            @if (isset($data) && count($data) > 0)
                @foreach ($data as $item)
                    <div class="card p-4 col-4 d-flex flex-column justify-content-between gap-2">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $item->task }}</h3>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" type="button" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $item->id }}"
                                                data-title="{{ $item->task }}" data-status="{{ $item->status }}"
                                                data-content="{{ $item->content }}">Update</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/delete/{{ $item->id }}">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>{{ $item->content }}</p>
                        </div>
                        <div class="border rounded p-1 d-inline w-25 d-flex justify-content-center">{{ $item->status }}
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <p>You don't have tasks.</p>
                </div>
            @endif
        </div>
    </div>
    @include('modals.taskmodals')
@endsection
