@extends('user.layouts.app')

@section('title', 'Create Question')
@section('submissions', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Submit Solution
            </span>

            <span>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-success">Question</a>
            </span>
        </div>
    </div>

    <div class="container my-5 border border-radius">
        <form action="{{ route('user.submission.store', ['question' => $question->id]) }}" method="POST" class="m-5" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="file">
                <label class="input-group-text" for="file">Submit Solution</label>
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
