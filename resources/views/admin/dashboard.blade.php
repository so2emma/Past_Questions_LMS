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
                <div class="col-3 ">
                    <div class="p-5 fw-bold h4 border bg-primary text-white">
                        <a href="{{route('admin.colleges.index')}}" class="link-light">Colleges</a>
                        <p class="fw-light p-2">NO: 0 </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-5 fw-bold h4 border bg-primary text-white">
                        Departments
                        <p class="fw-light p-2">NO: 0 </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-5 fw-bold h4 border bg-primary text-white">
                        Programmes
                        <p class="fw-light p-2">NO: 0 </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-5 fw-bold h4 border bg-primary text-white">
                        Questions
                        <p class="fw-light p-2">NO: 0 </p>
                    </div>
                </div>
            </div>
        </div>




    </div>


@endsection
