@extends('layout.app')


@section('title', 'ToDo-List')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="bg-light min-vh-100">

        <div class="container-fluid container-md justify-content-center p-4 align-items-center pt-5">
            <div class="row g-3">
                <h1 class="text-center">Add Task to To-Do List</h1>

                <form action="{{route('tasks.create')}}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <input class="form-control mr-2" required type="text" name="title" placeholder="Title">
                        <button type="submit" class="btn btn-primary ms-2">Add</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-fluid container-md justify-content-center p-4 align-items-center pt-5">
            {{-- List task --}}
            <h1 class="text-center">To-Do List</h1>
            <ul class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-flex align-items-center mb-0">
                            @csrf
                            @method('PUT')
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    onchange="this.form.submit()"
                                    {{ $task->status === 'selesai' ? 'checked' : '' }}
                                    id="taskCheck{{ $task->id }}"
                                >
                                <div class="d-flex">
                                    @if ($task->status === 'selesai')
                                        <span class="badge text-bg-success" style="height: min-content">Selesai</span>
                                    @else
                                        <span class="badge text-bg-danger" style="height: min-content">Belum</span>
                                    @endif
                                    <label class="form-check-label ps-1" for="taskCheck{{ $task->id }}">
                                        <span style="text-decoration: {{ $task->is_done ? 'line-through' : 'none' }}">
                                            {{ $task->title }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('tasks.delete', $task->id) }}" method="POST" class="mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection