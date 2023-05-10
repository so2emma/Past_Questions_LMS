@extends('admin.layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Edit course
            </span>

            <span>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-success">View Courses</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" class="m-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="name" class="form-control" name="name" value="{{ $course->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="course_code" class="form-label">Course Code</label>
                <input type="course_code" class="form-control" name="course_code" value="{{ $course->course_code }}">
            </div>
            @error('course_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description">
                    {{$course->description}}
        </textarea>`
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
