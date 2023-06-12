@extends('user.layouts.app')

@section('title', 'Create submission')
@section('submissions', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Peer Assignment Solution
            </span>

            <span>
                <a href="{{ route('user.submissions.index', ['user' => Auth::guard('web')->user()]) }}"
                    class="btn btn-success">Back</a>
            </span>
        </div>
    </div>

    <div class="container my-5 ">

        <div class="container my-5 border shadow">
            <div class="row m-5">
                <span class="h1 text-center my-5">
                    Assignment Grading Form
                </span>

                <form method="POST" action="{{ route('user.grading.allocation', ['submission' => $peer_submission->id]) }}" >
                    @csrf

                    <div class="mb-3">
                        <label for="score">Type in Score: (min:10 maximum: 100) </label>
                        <input type="number" name="score" class="form-control" placeholder="Type in Score Here">
                    </div>

                    <div class="mb-3">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="content">Type in remarks (Suggestion and the rest)</label>
                        <input id="x" type="hidden" name="remark">
                        <trix-editor input="x"></trix-editor>
                    </div>

                    <button class="btn btn-secondary">Submit Grade Report</button>
                </form>

            </div>
        </div>

        <div class="container">
            <div class="row m-auto">
                <iframe src="{{ Storage::url($peer_submission->path) }}" width="1000px" height="800px"></iframe>
            </div>
        </div>



    </div>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection
