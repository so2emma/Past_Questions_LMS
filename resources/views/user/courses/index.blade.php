@extends('user.layouts.app')

@section('title', 'Course enroll')
@section('enroll', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h4>Course Enrollment is Currently Available</h4>
            <div class="card">
                <div class="card-header">
                    Find Course
                </div>
                <div class="card-body">
                    <form action="{{ route('user.available.course') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" name="course" type="text" placeholder="Enter Course Name/Code">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                @if (isset($courses))
                    @if ($courses->isEmpty())
                        <div class="alert alert-danger m-3">
                            No course found.
                        </div>
                    @else
                        @foreach ($courses as $course)
                            <div class="card m-3">
                                <div class="card-body d-flex">
                                    <p class="h2 me-auto">
                                        {{ $course->course_code . '-' . $course->name }}
                                    </p>
                                    @if (Auth::guard('web')->user()->courses->contains($course))
                                        <form action="{{ route('user.course.unenroll', ['course' => $course->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger me-5">Unenroll</button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.course.enroll', ['course' => $course->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success me-5">Enroll</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
