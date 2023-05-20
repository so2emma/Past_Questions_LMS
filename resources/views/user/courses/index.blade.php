@extends('user.layouts.app')

@section('title', 'Registered Courses')
@section('courses', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h4>List of registered courses</h4>
            <div class="container">


                @if ($courses->isEmpty())
                    <div class="alert alert-danger">
                        <p>No courses enrolled yet.</p>
                    </div>
                @else
                    @foreach ($courses as $course)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="h3 m-3">
                                    <a href="{{ route('user.course.questions', ['course' => $course->id]) }}">
                                        {{ $course->course_code . '-' . $course->name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection