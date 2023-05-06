@extends('admin.layouts.app')

@section('title', 'Login')
@section('login', 'active')

@section('content')
    <div class="row col-md-6 m-auto my-5">

        <div class="card">
            <div class="card-header">
                Admin Login

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.authenticate') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
