@extends('user.layouts.app')

@section('title', 'Create Question')
@section('courses', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                {{ $question->course->course_code . ' ' . $question->session->session_name . ' session' }}
            </span>

            <span>
                <a href="{{ route('user.course.questions', ['course' => $question->course->id]) }}"
                    class="btn btn-success">Back</a>
            </span>
        </div>
        <div>
            @if ($question->userHasMadeSubmission(Auth::guard('web')->user(), $question)->first())
                <button class="btn btn-dark-outline" disabled="disabled">Assignment Submitted</button>
                <a href="" class="btn btn-success">Grade Peers Submission</a>
            @else
                <a class="btn btn-primary" href="{{ route('user.submission.create', ['question' => $question->id]) }}">Make A
                    Submission</a>
            @endif
        </div>
    </div>

    <div class="container my-5">
        <div class="container">
            <iframe src="{{ Storage::url($question->path) }}" width="1000px" height="800px"></iframe>
        </div>
    </div>
@endsection
