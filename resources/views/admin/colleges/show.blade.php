@extends('admin.layouts.app')

@section('title', 'Show Colleges')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Colleges
            </span>

            <span>
                <a href="{{ route('admin.colleges.create') }}" class="btn btn-success">Create</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Acronym</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($colleges as $college)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $college->name }} </td>
                        <td> {{ $college->description }} </td>
                        <td> {{ $college->abbr }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.colleges.edit', $college->id) }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ route('admin.colleges.destroy', $college->id) }}" method="POST">
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
