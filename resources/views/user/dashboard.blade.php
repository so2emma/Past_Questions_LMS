@extends('user.layouts.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <div class="container">
        <div class="py-5">
            <h1>HI <span class="fw-bold">{{ Auth::guard('web')->user()->name }}</span> !</h1>
            <p class="lead">Welcome Back!</p>
        </div>

        <div class="card">
            <div class="m-3 p-3">
                <h3 class="fw-bold"> Breakdown of your activities</h3>

                <div class="card-body">
                    <div>
                        <div class="lead">
                            No of registered courses: <span class="fw-bold">{{ count($courses) ?? 0 }}</span>
                        </div>
                        <div class="lead">
                            No of submitted Assignments: <span class="fw-bold">{{ count($submissions) ?? 0 }}</span>
                        </div>
                    </div>

                    <div class="my-5">

                        @if(!$submissions->isEmpty())
                            <div class="card m-2 p-2">
                                <div class="card-header text-center fw-bold">
                                    Most recently submitted assignments
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Time Submitted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            ?>
                                            @foreach ($submissions as $submission)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $submission->question->course->course_code }}</td>
                                                    <td>{{ $submission->question->session->session_name }}</td>
                                                    <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @endif

                        @if(!$submissions_graded->isEmpty())
                        <div class="card m-2 p-2">
                            <div class="card-header text-center fw-bold">
                                Graded Submissions
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Time Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach ($submissions_graded as $submission)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $submission->question->course->course_code }}</td>
                                                <td>{{ $submission->question->session->session_name }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif


                        @if(!$submissions_ungraded->isEmpty())
                        <div class="card m-2 p-2">
                            <div class="card-header text-center fw-bold">
                                Ungraded Submissions
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Time Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach ($submissions_ungraded as $submission)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $submission->question->course->course_code }}</td>
                                                <td>{{ $submission->question->session->session_name }}</td>
                                                <td>{{ $submission->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                        {{-- <div class="card m-2 p-2">
                            <div class="card-header text-center fw-bold">
                                Graded Submissions
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Time Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card m-2 p-2">
                            <div class="card-header text-center fw-bold">
                                Ungraded Submissions
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Time Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
