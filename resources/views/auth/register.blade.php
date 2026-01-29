@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">

            <div class="card auth-card p-4">
                <h4 class="text-center mb-4">Register</h4>

                <form method="POST" action="{{ route('register') }}" onsubmit="showLoading()">
                    @csrf

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">Register</button>

                    <p class="text-center mt-3 mb-0">
                        Already have an account?
                        <a href="{{ route('login.page') }}">Login</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
