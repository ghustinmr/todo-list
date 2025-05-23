@extends('layout.app')


@section('title', 'ToDo-List')

@section('content')
    <div class="bg-light min-vh-100">

        <div class="container-fluid container-md justify-content-center p-4 align-items-center pt-5">
            <div class="row g-3">
                <h1 class="text-center">Add Item ToDo-List</h1>

                <form action="{{route('tasks.create')}}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <input class="form-control mr-2" required type="text" name="title" placeholder="Title">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-fluid container-md justify-content-center p-4 align-items-center pt-5">
            {{-- List task --}}
            <h1 class="text-center">ToDo-List</h1>
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
                                @if ($task->status === 'selesai')
                                    <div class="text-primary">Selesai</div>
                                @else
                                    <div class="text-danger">Belum</div>
                                @endif
                                <label class="form-check-label" for="taskCheck{{ $task->id }}">
                                    <span style="text-decoration: {{ $task->is_done ? 'line-through' : 'none' }}">
                                        {{ $task->title }}
                                    </span>
                                </label>
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