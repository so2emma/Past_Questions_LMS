@extends('user.layouts.app')

@section('title', 'Update Solution')
@section('submissions', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Update Solution
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('user.submission.update', ['submission' => $submission->id]) }}" method="POST" class="m-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="file">
                <label class="input-group-text" for="file">Submit New Solution</label>
            </div>

            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
