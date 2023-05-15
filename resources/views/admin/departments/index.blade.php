@extends('admin.layouts.app')

@section('title', 'Show Departments')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Departments
            </span>

            <span>
                <a href="{{ route('admin.departments.create') }}" class="btn btn-success">Create</a>
            </span>
        </div>

    </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">College</th>
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
                @foreach ($departments as $department)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $department->college->abbr }} </td>
                        <td> {{ $department->name }} </td>
                        <td> {{ $department->description }} </td>
                        <td> {{ $department->abbr }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">
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
