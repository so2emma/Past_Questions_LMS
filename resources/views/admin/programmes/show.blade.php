@extends('admin.layouts.app')

@section('title', 'Show Programmes')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Programmes
            </span>

            <span>
                <a href="{{ route('admin.programmes.create') }}" class="btn btn-success">Create</a>
            </span>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Name</th>
                    <th scope="col">programme</th>
                    <th scope="col">Acronym</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($programmes as $programme)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $programme->department->name }} </td>
                        <td> {{ $programme->name }} </td>
                        <td> {{ $programme->description }} </td>
                        <td> {{ $programme->abbr }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.programmes.edit', $programme->id) }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ route('admin.programmes.destroy', $programme->id) }}" method="POST">
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
