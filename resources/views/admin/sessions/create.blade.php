@extends('admin.layouts.app')

@section('title', 'Create Session')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Create Session
            </span>

            <span>
                <a href="{{ route('admin.sessions.index') }}" class="btn btn-success">View all Sessions</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.sessions.store') }}" method="POST" class="m-3">
            @csrf
            <div class="mb-3">
                <label for="session_start" class="form-label">Session Start</label>
                <input type="number" class="form-control" name="session_start" value="{{ old('session_start') }}">
            </div>
            @error('session_start')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="session_end" class="form-label">Session End</label>
                <input type="number" class="form-control" name="session_end" value="{{ old('session_end') }}">
            </div>
            @error('session_end')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
