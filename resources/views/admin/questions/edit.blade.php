@extends('admin.layouts.app')

@section('title', 'Edit Question')
@section('question', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Edit question
            </span>

            <span>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-success">View questions</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.questions.update', $question->id) }}" method="POST" class="m-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- relationship with course --}}
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" name="course_id">
                    <option value=""></option>
                    @foreach ($courses as $course)
                        <option {{ $course->id === $question->course->id ? 'selected' : '' }} value="{{ $course->id }}">
                            {{ $course->course_code }}</option>
                    @endforeach
                </select>
            </div>
            @error('course_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- relationship with session --}}
            <div class="mb-3">
                <label for="session_id" class="form-label">session</label>
                <select class="form-select" name="session_id">
                    <option value=""></option>
                    @foreach ($sessions as $session)
                        <option {{ $session->id === $question->session->id ? 'selected' : '' }} value="{{ $session->id }}">
                            {{ $session->session_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('session_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- File Upload --}}
            <div class="input-group mb-3">
                <input type="file" name="question_file" class="form-control" id="question_file">
                <label class="input-group-text" for="question_file">Upload Question</label>
            </div>

            @error('question_file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </form>
    </div>
@endsection
