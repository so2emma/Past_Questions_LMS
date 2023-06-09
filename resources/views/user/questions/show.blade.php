@extends('user.layouts.app')

@section('title', 'Create Question')
@section('courses', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                {{ $question->course->course_code . ' ' . $question->session->session_name . ' session' }}
                <button class="btn btn-dark-outline" disabled="disabled">Solution Submitted</button>
            </span>

            <span>
                <a href="{{ route('user.course.questions', ['course' => $question->course->id]) }}"
                    class="btn btn-success">Back</a>
            </span>
        </div>
        <div>
            @if ($question->userHasMadeSubmission(Auth::guard('web')->user(), $question)->first())
                <a href="{{ route('user.submission.show', ['submission' => $submission->id]) }}" class="btn btn-primary">View Submission</a>
                <a href="{{ route('user.grading.submission', ['submission' => $submission->id]) }}" class="btn btn-success">Grade Peers Submission</a>
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
