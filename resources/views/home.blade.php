@extends('layout.layout')
@section('content')
    <div>
        @if (isset($tasks) && count($tasks) > 0)
            @php
                $filters = ['All', 'Todo', 'Pending', 'Complete'];
                $sorters = ['asc' => 'Ascending', 'desc' => 'Descending'];
            @endphp
            <div class="d-flex justify-content-between align-items-end my-4">
                <div>
                    @foreach ($filters as $f)
                        @if ($f == $tab)
                            <a href="/?filter={{ $f }}&sort={{ $sort }}"
                                class="btn border bg-primary rounded-0">{{ $f }}</a>
                        @else
                            <a href="/?filter={{ $f }}&sort={{ $sort }}"
                                class="btn border rounded-0">{{ $f }}</a>
                        @endif
                    @endforeach
                </div>
                <div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Sort by creation date
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($sorters as $sk => $s)
                                @if ($sk == $sort)
                                    <li><a class="dropdown-item text-primary"
                                            href="/?filter={{ $tab }}&sort={{ $sk }}">{{ $s }}</a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item"
                                            href="/?filter={{ $tab }}&sort={{ $sk }}">{{ $s }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div>
                    <form action="{{ route('search') }}" method="POST" class="d-flex gap-1 align-items-center">
                        @csrf
                        @method('POST')
                        @if (isset($search))
                            <input type="text" name="search" id="search" placeholder="search your tasks.."
                                value="{{ $search }}" class="form-control">
                        @else
                            <input type="text" name="search" id="search" placeholder="search your tasks.."
                                class="form-control">
                        @endif
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </form>
                </div>
            @else
                <div class="d-flex justify-content-center my-4">
        @endif
        <div>
            <button class="btn btn-primary rounded-0" type="button" data-bs-toggle="modal" data-bs-target="#createModal">+
                Create a
                new Task</button>
        </div>
    </div>
    <div>
        @if (isset($search_error))
            <p class="alert alert-warning text-center">{{ $search_error }}</p>
        @endif
    </div>
    <div class="row">
        @if (isset($tasks) && count($tasks) > 0)
            @foreach ($tasks as $item)
                <div class="col-4 p-2">
                    <div
                        class="{{ $item->status }} card p-4 h-100 d-flex flex-column justify-content-between gap-2 rounded-0">
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $item->task }}</h3>
                                <div class="dropdown dropstart mw-0">
                                    <button class="btn rounded-0" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                        </svg></button>
                                    <ul class="dropdown-menu text-end rounded-0" style="min-width: 0">
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
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="border rounded-0 p-1 d-inline w-25 d-flex justify-content-center">
                                {{ $item->status }}
                            </div>
                            <div class="rounded-0 p-1 d-inline w-25 d-flex justify-content-center">
                                <p class="small">{{ $item->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @if (isset($tasks) && count($tasks) > 0)
        <div class="d-flex justify-content-center my-2">
            {{ $tasks->links() }}
        </div>
    @endif
    </div>
    @include('modals.taskmodals')
@endsection
