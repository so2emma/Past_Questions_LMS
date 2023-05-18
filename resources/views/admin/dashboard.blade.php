@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <div class=" container my-5">
        <span class="h4 fw-bold">
            Dashboard
        </span>
        <div class="container text-center mt-5 ">
            <div class="row">
                <div class="col-md-4 col-10 m-auto">
                    <div class="p-5 fw-bold h4 border bg-primary text-white">
                        <a href="{{route('admin.sessions.index')}}" class="link-light text-decoration-none">Sessions</a>
                        <p class="fw-light p-2">{{ count($sessions) }} </p>
                    </div>
                </div>
                <div class="col-md-4 col-10 m-auto">
                    <div class="p-5 fw-bold h4 border bg-success text-white">
                        <a href="{{route('admin.courses.index')}}" class="link-light text-decoration-none">Courses</a>
                        <p class="fw-light p-2">{{ count($courses) }} </p>
                    </div>
                </div>
                <div class="col-md-4 col-10 m-auto">
                    <div class="p-5 fw-bold h4 border bg-danger text-white">
                        <a href="{{route('admin.questions.index')}}" class="link-light text-decoration-none">Questions</a>
                        <p class="fw-light p-2">{{ count($questions) }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection
