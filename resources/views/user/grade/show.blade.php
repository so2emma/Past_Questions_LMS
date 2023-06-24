@extends('user.layouts.app')

@section('title', 'Grading Section')
@section('gradings', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h3 class="fw-bold">Peer Grades for submission: {{ $submission->question->course->course_code }}</h3>
            <div class="container py-5">

                <div class="container py-5">
                    @if ($gradings->isEmpty())
                        <div class="alert alert-danger">
                            <p>No grading graded yet</p>
                        </div>
                    @else
                        @foreach ($gradings as $grading)
                            <div class="card mb-3">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-md-10">
                                            <h4 class="h2 fw-bold">
                                                Score: {{ $grading->score }}
                                            </h4>
                                            <p class="lead mb-0">
                                                <p class="fw-bold" >Remark:</p>
                                                {!! $grading->remark  !!}
                                            </p>
                                        </div>
                                        {{-- <div class="col-md-2">
                                            <a class="btn btn-primary m-2 fw-bold"
                                                href="{{ route('user.grading.grade.show', ['grading' => $grading->id]) }}">Grading</a>
                                        </div> --}}
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
