@extends('admin.layouts.app')

@section('title', 'Edit Programme')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Edit Programme
            </span>

            <span>
                <a href="{{ route('admin.programmes.index') }}" class="btn btn-success">View Programmes</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.programmes.update', $programme->id) }}" method="POST" class="m-3">
            @csrf
            @method('PUT')

            {{-- relationship with department --}}
            <div class="mb-3">
                <label for="department_id" class="form-label">Programme Department</label>
                <select class="form-select" name="department_id" >
                    @foreach ($departments as $department)
                        <option {{ $department->id === $programme->department->id ? 'selected' : '' }} value="{{ $department->id }}"> {{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('department_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">programme Name</label>
                <input type="name" class="form-control" name="name" value="{{ $programme->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="abbr" class="form-label">programme Acronym</label>
                <input type="abbr" class="form-control" name="abbr" value="{{ $programme->abbr }}">
            </div>
            @error('abbr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description">
                    {{ $programme->description }}
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
