@extends('layouts.main')

@section('title', 'Attach file to message for Linebet Promocode Bot')

@section('main')
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-auto p-5 bg-body-secondary border rounded w-50">
                <form action="{{ route('telegram-bot.files.store', ['messageId' => $message->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 d-flex justify-content-center">
                        <h1>Create message</h1>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="file" dir="rtl">
                        <label class="input-group-text" for="inputGroupFile02" dir="rtl">Upload</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-3">
                        Upload and attach
                    </button>
                </form>
            </div>
        </div>
@endsection
