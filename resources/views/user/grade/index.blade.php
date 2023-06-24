@extends('user.layouts.app')

@section('title', 'Grading Section')
@section('gradings', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h3 class="fw-bold">Submissions that have been graded</h3>
            <div class="container py-5">

                <div class="container py-5">
                    @if ($submissions->isEmpty())
                        <div class="alert alert-danger">
                            <p>No submission graded yet</p>
                        </div>
                    @else
                        @foreach ($submissions as $submission)
                            <div class="card mb-3">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-md-10">
                                            <h4 class="h2 fw-bold">
                                                {{ $submission->question->course->course_code }}
                                            </h4>
                                            <p class="lead mb-0">
                                                {{ $submission->question->course->name }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-primary m-2 fw-bold"
                                                href="{{ route('user.submission.grade.show', ['submission' => $submission->id]) }}">View Grades</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
