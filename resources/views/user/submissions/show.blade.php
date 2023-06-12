@extends('user.layouts.app')

@section('title', 'Create submission')
@section('submissions', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                {{ $submission->question->course->course_code . ' ' . $submission->question->session->session_name . ' session' }} <br>
                {{ 'submitted '.$submission->created_at->toDayDateTimeString() }}
            </span>

            <span>
                <a href="{{ route('user.submissions.index', ['user' => Auth::guard('web')->user() ]) }}"
                    class="btn btn-success">Back</a>
            </span>
        </div>
        <div>
            <a href="{{ route('user.grading.submission', ['submission' => $submission->id]) }}" class="btn btn-success">Grade Peers Submission</a>
        </div>
    </div>

    <div class="container my-5">
        <div class="container">
            <iframe src="{{ Storage::url($submission->path) }}" width="1000px" height="800px"></iframe>
        </div>
    </div>
@endsection
