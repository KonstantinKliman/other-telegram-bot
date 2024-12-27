@extends('layouts.main')

@section('title', 'Linebet Promocode Bot messages')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <h1>Telegram Messages</h1>
            </div>
        </div>
        <div class="row">
            @foreach($messages as $index => $message)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body bg-body-secondary h-100 d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between border-bottom">
                                <h4 class="card-title">
                                    Message #{{ $index + 1 }}
                                    @switch($message->type)
                                        @case(\App\Enums\MessageTypeEnum::START_MESSAGE->value)
                                            <span class="badge text-bg-danger">START MESSAGE</span>
                                            @break
                                        @case(\App\Enums\MessageTypeEnum::LAST_MESSAGE->value)
                                            <span class="badge text-bg-danger">LAST MESSAGE</span>
                                            @break
                                    @endswitch
                                </h4>
                                @if($message->files->count() > 0)
                                    <div class="d-inline-flex align-items-center">
                                        <p class="m-0"><strong>Attached files:</strong></p>
                                        @foreach($message->files as $file)
                                            <a class="btn btn-sm btn-secondary" href="{{ asset($file->path) }}">{{ strtoupper($file->type) }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <form action="{{ route('telegram-bot.messages.update', ['id' => $message->id]) }}" method="POST">
                                @csrf
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <div class="mb-3 d-flex justify-content-start align-items-start flex-column">
                                        @if($message->buttons->count() > 0)
                                            <p class="m-0"><strong>Attached buttons:</strong></p>
                                            @foreach($message->buttons as $button)
                                                <x-message-modal :button="$button" />
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        <div class="mb-3">
                                            <label for="message-text-{{ $index }}" class="form-label"><strong>Text</strong></label>
                                            <textarea class="form-control" id="message-text-{{ $index }}" name="text" rows="8">{{ $message->text }}</textarea>
                                        </div>
                                        <button class="btn btn-success w-100" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
