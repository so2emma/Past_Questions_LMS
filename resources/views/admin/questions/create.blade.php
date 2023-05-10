@extends('admin.layouts.app')

@section('title', 'Create Question')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Create Question
            </span>

            <span>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-success">View questions</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.questions.store') }}" method="POST" class="m-3">
            @csrf
            {{-- relationship with course --}}
            <div class="mb-3">
                <label for="course_id" class="form-label">question course</label>
                <select class="form-select" name="course_id" id="">
                    <option selected value=""></option>
                    @foreach ($courses as $course)
                    <option value="{{$course->id }}"> {{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('course_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">question Name</label>
                <input type="name" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="abbr" class="form-label">question Acronym</label>
                <input type="abbr" class="form-control" name="abbr" value="{{ old('abbr') }}">
            </div>
            @error('abbr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description">
                    {{ old('name') }}
        </textarea>
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
