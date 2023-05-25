@extends('admin.layouts.app')

@section('title', 'Show users')
@section('user', 'active')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all users
            </span>

            <span>
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create</a>
            </span>
        </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">No. of enrollment</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($users as $user)
                    <tr>

                        <th scope="row">{{ $i++ }}</th>
                        <td> {{ $user->name }} </td>
                        <td> {{ count($user->courses) }} </td>
                        <td>
                            <span class="d-flex justify-content-center">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary mx-1">View</a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
