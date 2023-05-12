@extends('admin.layouts.app')

@section('title', 'Show Courses')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Courses
            </span>

            <span>
                <a href="{{ route('admin.courses.create') }}" class="btn btn-success">Create</a>
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
                    <th scope="col">Course Code</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($courses as $course)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $course->name }} </td>
                        <td> {{ $course->description }} </td>
                        <td> {{ $course->course_code }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
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
