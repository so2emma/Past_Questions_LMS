@extends('admin.layouts.app')

@section('title', 'Show Sessions')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Sessions
            </span>

            <span>
                <a href="{{ route('admin.sessions.create') }}" class="btn btn-success">Create</a>
            </span>
        </div>

    </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($sessions as $session)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $session->session_name }} </td>
                        <td> {{ $session->session_start }} </td>
                        <td> {{ $session->session_end }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <form action="{{ route('admin.sessions.destroy', $session->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
