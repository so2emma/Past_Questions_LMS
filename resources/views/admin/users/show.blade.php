@extends('admin.layouts.app')

@section('title', 'View User')
@section('user', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                 {{ $user->course->course_code.' '. $user->session->session_name.' session' }}
            </span>

            <span>
                <a href="{{ route('admin.users.index') }}" class="btn btn-success">View all users</a>
            </span>
        </div>
    </div>

    <div class="container my-5">
        <div class="container">
            <iframe src ="{{ Storage::url($user->path) }}" width="1000px" height="800px"></iframe>
        </div>
    </div>
@endsection
