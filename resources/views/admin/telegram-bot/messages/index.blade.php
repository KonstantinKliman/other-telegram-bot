@extends('layouts.main')

@section('title', 'Linebet Promocode Bot messages')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <h1>Telegram Messages</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <a href="{{ route('telegram-bot.messages.create') }}" class="btn btn-success">Create message</a>
            </div>
        </div>
        <div class="row">
            @foreach($messages as $index => $message)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body bg-body-secondary h-100 d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                                <h4 class="m-0">
                                    Message #{{ $message->id }}
                                    @switch($message->type)
                                        @case(\App\Enums\MessageTypeEnum::START_MESSAGE->value)
                                             / START MESSAGE
                                            @break
                                        @case(\App\Enums\MessageTypeEnum::LAST_MESSAGE->value)
                                             / LAST MESSAGE
                                            @break
                                    @endswitch
                                </h4>
                                <div>
                                    @if($message->type !== \App\Enums\MessageTypeEnum::START_MESSAGE->value || $message->type !== \App\Enums\MessageTypeEnum::LAST_MESSAGE->value)
                                        <a href="{{ route('telegram-bot.files.create', ['messageId' => $message->id]) }}" class="btn btn-sm btn-success">Attach file</a>
                                    @endif
                                    @if($message->files->count() > 0)
                                        <x-attached-files-modal :files="$message->files" :messageId="$message->id"/>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('telegram-bot.messages.update', ['id' => $message->id]) }}" method="POST">
                                @csrf
                                <div class="d-flex flex-column justify-content-center h-auto">
                                    <div class="mb-3">
                                        <label for="message-text-{{ $index }}" class="form-label"><strong>Text</strong></label>
                                        <textarea class="form-control" id="message-text-{{ $index }}" name="text" rows="8" dir="rtl">{{ $message->text }}</textarea>
                                    </div>
                                    <button class="btn btn-success w-100" type="submit">Save</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <form action="{{ route('telegram-bot.messages.delete', ['id' => $message->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger w-100" type="submit" @if($message->type == \App\Enums\MessageTypeEnum::START_MESSAGE->value || $message->type == \App\Enums\MessageTypeEnum::LAST_MESSAGE->value) disabled @endif>Delete message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
