@extends('user.layouts.app')

@section('title', 'Questions')
@section('courses', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h4>{{ $course->course_code }} Questions</h4>
            <div class="container">


                @if ($questions->isEmpty())
                    <div class="alert alert-danger">
                        <p>No questions Uploaded yet</p>
                    </div>
                @else
                    @foreach ($questions as $question)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="h3 m-3">
                                    <a href="{{ route('user.show.question', ['question' => $question->id]) }}">
                                        {{ $course->course_code . '-' . $course->name . ' Session ' . $question->session->session_name }}
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
