@extends('user.layouts.app')

@section('title', 'Grading Section')
@section('gradings', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <h3 class="fw-bold">List of registered gradings:</h3>
            <div class="container py-5">
                @if ($gradings->isEmpty())
                    <div class="alert alert-danger">
                        <p class="fw-bold">Nothing to see here</p>
                    </div>
                @else
                    @foreach ($gradings as $grading)
                        <div class="card mb-3">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <h4 class="h2 fw-bold">
                                            {{ $grading->grading_code }}
                                        </h4>
                                        <p class="lead mb-0">
                                            {{ $grading->name }}
                                        </p>
                                        <span> No. of question: {{ count($grading->questions) }}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary m-2 fw-bold"
                                            href="{{ route('user.grading.questions', ['grading' => $grading->id]) }}">View
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
