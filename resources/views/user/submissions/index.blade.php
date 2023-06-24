@extends('user.layouts.app')

@section('title', 'submissions')
@section('submissions', 'active')

@section('content')
    <div class="container">
        <div class="m-5">
            <div class="container my-5">
            <h4 class="h2 fw-bold">Solutions Submission</h4>
                @if ($submissions->isEmpty())
                    <div class="alert alert-danger">
                        <p>No submissions made yet</p>
                    </div>
                @else
                    <div class="container my-5">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">Time Submitted</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($submissions as $submission)
                                    <tr>

                                        <th scope="row">{{ $i++ }}</th>
                                        <td> {{ $submission->question->course->course_code }} </td>
                                        <td> {{ $submission->question->session->session_name }} </td>
                                        <td> {{ $submission->created_at->toDayDateTimeString() }} </td>
                                        <td>
                                            <span class="d-flex justify-content-center">
                                                <a href="{{ route('user.submission.show', ['submission' => $submission->id]) }}"
                                                    class="btn btn-primary me-2">View</a>
                                                <a href="{{ route('user.submission.edit', ['submission' => $submission->id]) }}"
                                                    class="btn btn-success me-2">Edit</a>
                                                <form action="{{ route('user.submission.destroy', $submission->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection
