@extends('admin.layouts.app')

@section('title', 'Show Questions')
@section('question', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Questions
            </span>

            <span>
                <a href="{{ route('admin.questions.create') }}" class="btn btn-success">Create</a>
            </span>
        </div>
    </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Session</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($questions as $question)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> <a href="{{ route('admin.questions.show', $question->id) }}">{{ $question->course->course_code }}</a>  </td>
                        <td> {{ $question->session->session_name }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-success mx-1">Edit</a>
                                <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
