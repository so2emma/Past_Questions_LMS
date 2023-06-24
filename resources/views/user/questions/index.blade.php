@extends('user.layouts.app')

@section('title', 'Questions')
@section('courses', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h4 class="h2 fw-bold">{{ $course->course_code }} Questions</h4>
            <div class="container my-5">
                @if ($questions->isEmpty())
                    <div class="alert alert-danger">
                        <p>No questions Uploaded yet</p>
                    </div>
                @else
                    @foreach ($questions as $question)
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <h4 class="fw-bold">
                                            <span>
                                                {{ $question->session->session_name . ' Session ' }}
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary m-2 fw-bold"
                                            href="{{ route('user.show.question', ['question' => $question->id]) }}">SHOW</a>
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
