@extends('admin.layouts.app')

@section('title', 'Create College')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Create College
            </span>

            <span>
                <a href="{{ route('admin.colleges.index') }}" class="btn btn-success">View Colleges</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.colleges.store') }}" method="POST" class="m-3">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">College Name</label>
                <input type="name" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="abbr" class="form-label">College Acronym</label>
                <input type="abbr" class="form-control" name="abbr" value="{{ old('abbr') }}">
            </div>
            @error('abbr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description">
                    {{ old('name') }}
        </textarea>`
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
