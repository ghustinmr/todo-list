@extends('layout.app')


@section('title', 'Create Item')

@section('content')
<div>

    <section>
        <h1>Create Item Todo</h1>

        <form action="POST">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title">
            </div>
            <button type="submit">Add</button>
        </form>

    </section>
    <section>
        {{-- <h1>To</h1> --}}
    </section>

</div>
@endsection