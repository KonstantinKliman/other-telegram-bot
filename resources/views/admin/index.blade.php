@extends('layouts.main')

@section('title', 'Linebet Promocode Bot Admin Panel')

@section('main')
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-auto">
                <h1>
                    Welcome, {{ auth()->user()->login }}
                </h1>
            </div>
        </div>
    </div>
@endsection
