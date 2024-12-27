@extends('layouts.main')

@section('title', 'Create start buttons for Linebet Promocode Bot')

@section('main')
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-auto p-5 bg-body-secondary border rounded w-50">
                <form action="{{ route('telegram-bot.buttons.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 d-flex justify-content-center">
                        <h1>Create message</h1>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Button text" aria-label="btnText" aria-describedby="basic-addon1" dir="rtl" name="text">
                        <span class="input-group-text" id="basic-addon1">Text on button</span>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02" name="nextMessageId">
                            <option selected disabled dir="rtl">Choose...</option>
                            @foreach($message as $message)
                                <option value="{{ $message->id }}" dir="rtl">Message #{{ $message->id }}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">Next message after click the button</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-3">
                        Create
                    </button>
                </form>
            </div>
        </div>
@endsection
