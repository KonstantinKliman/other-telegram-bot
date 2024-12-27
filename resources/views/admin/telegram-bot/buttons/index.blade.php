@extends('layouts.main')

@section('title', 'Linebet Promocode Bot buttons')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <h1>Telegram <code>/start</code> Buttons</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <a href="{{ route('telegram-bot.buttons.create') }}" class="btn btn-success">Create button</a>
            </div>
        </div>
        @foreach($buttons as $index => $button)
            <div class="row mx-2 my-3">
                <div class="col-12 bg-body-secondary border rounded p-3">
                    <div class="">
                        <form action="{{ route('telegram-bot.buttons.update', ['id' => $button->id]) }}" id="editButton-{{ $button->id }}" method="POST">
                            @csrf
                            <div class="d-flex flex-column justify-content-center h-auto">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Button text" aria-label="btnText" aria-describedby="basic-addon1" value="{{ $button->text }}" dir="rtl" name="text">
                                    <span class="input-group-text" id="basic-addon1">Text on button</span>
                                </div>
                            </div>
                        </form>
                        <div class="w-100 d-flex justify-content-end">
                            <button class="btn btn-success" type="submit" form="editButton-{{ $button->id }}">Save</button>
                            <x-message-modal :button="$button" />
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
