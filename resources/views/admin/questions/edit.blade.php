@extends('admin.layouts.app')

@section('title', 'Edit department')
@section('question', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Edit department
            </span>

            <span>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-success">View departments</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST" class="m-3">
            @csrf
            @method('PUT')

            {{-- relationship with College --}}
            <div class="mb-3">
                <label for="college_id" class="form-label">Department College</label>
                <select class="form-select" name="college_id" >
                    @foreach ($colleges as $college)
                        <option {{ $college->id === $department->college->id ? 'selected' : '' }} value="{{ $college->id }}"> {{ $college->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('college_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">department Name</label>
                <input type="name" class="form-control" name="name" value="{{ $department->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="abbr" class="form-label">department Acronym</label>
                <input type="abbr" class="form-control" name="abbr" value="{{ $department->abbr }}">
            </div>
            @error('abbr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="description" class="form-control" name="description">
                    {{ $department->description }}
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
