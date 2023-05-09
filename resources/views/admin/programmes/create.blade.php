@extends('admin.layouts.app')

@section('title', 'Create Programme')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Create Programme
            </span>

            <span>
                <a href="{{ route('admin.programmes.index') }}" class="btn btn-success">View programmes</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('admin.programmes.store') }}" method="POST" class="m-3">
            @csrf
            {{-- relationship with department --}}
            <div class="mb-3">
                <label for="department_id" class="form-label">Programme Department</label>
                <select class="form-select" name="department_id" id="">
                    <option selected value=""></option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id }}"> {{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('department_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">programme Name</label>
                <input type="name" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="abbr" class="form-label">programme Acronym</label>
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
