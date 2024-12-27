@extends('layouts.main')

@section('title', 'Login')

@section('main')
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-auto p-5 bg-body-secondary border rounded w-25">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3 d-flex justify-content-center">
                        <h1>Login</h1>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Login" name="login">
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
