@extends('user.layouts.app')

@section('title', 'Registered Courses')
@section('courses', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h3 class="fw-bold">List of registered courses:</h3>
            <div class="container py-5">
                @if ($courses->isEmpty())
                    <div class="alert alert-danger">
                        <p>No courses enrolled yet.</p>
                    </div>
                @else
                    @foreach ($courses as $course)
                        <div class="card mb-3">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <h4 class="h2 fw-bold">
                                            {{ $course->course_code }}
                                        </h4>
                                        <p class="lead mb-0">
                                            {{ $course->name }}
                                        </p>
                                        <span> No. of question: {{ count($course->questions) }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary m-2 fw-bold"
                                            href="{{ route('user.course.questions', ['course' => $course->id]) }}">View
                                            Questions</a>
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
@endsection
