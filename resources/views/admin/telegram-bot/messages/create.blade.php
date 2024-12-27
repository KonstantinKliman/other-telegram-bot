@extends('layouts.main')

@section('title', 'Create message for Linebet Promocode Bot')

@section('main')
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-auto p-5 bg-body-secondary border rounded w-50">
            <form action="{{ route('telegram-bot.messages.store') }}" method="POST">
                @csrf
                <div class="mb-3 d-flex justify-content-center">
                    <h1>Create message</h1>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="form-label"><strong>Text</strong></label>
                    <textarea class="form-control" id="message-text" name="text" rows="8" dir="rtl"></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100 py-3">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection
