@extends('admin.layouts.app')

@section('title', 'Edit College')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between">
        <span class="h4  me-auto fw-bold">
            Edit College
        </span>

        <span>
            <a href="{{route('admin.colleges.index')}}" class="btn btn-success">View Colleges</a>
        </span>
    </div>

</div>
@endsection
