@extends('layouts.main')

@section('title', 'Linebet Promocode Bot buttons')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <h1>Telegram <code>/start</code> Buttons</h1>
            </div>
        </div>
        @foreach($buttons as $button)
            <div class="row mx-2 my-3">
                <div class="col-12 bg-body-secondary border rounded p-3">
                    <div class="">
                        <p class="m-0">
                            {{ $button->text }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
