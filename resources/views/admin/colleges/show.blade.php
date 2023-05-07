@extends('admin.layouts.app')

@section('title', 'Show Colleges')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <span class="h4  me-auto fw-bold">
                Displaying all Colleges
            </span>

            <span>
                <a href="{{route('admin.colleges.create')}}" class="btn btn-success">Create</a>
            </span>
        </div>

    </div>

    <div class="container my-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Programmes</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <span>
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
