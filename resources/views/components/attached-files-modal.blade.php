@props(['files', 'messageId'])

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#telegramBotAttachedFileModal-{{ $messageId }}">
    Files
</button>

<div class="modal fade" id="telegramBotAttachedFileModal-{{ $messageId }}" tabindex="-1" aria-labelledby="telegramBotAttachedFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="telegramBotAttachedFileModalLabel">Attached files</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    @foreach($files as $file)
                        @switch($file->type)
                            @case(\App\Enums\FileTypeEnum::IMAGE->value)
                                <a href="{{ $file->url }}" class="btn btn-sm btn-secondary me-2" target="_blank">{{ ucfirst($file->type) }}</a>
                                <form action="{{ route('telegram-bot.files.delete', ['messageId' => $messageId, 'fileId' => $file->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete {{ ucfirst($file->type) }}</button>
                                </form>
                                @break
                            @case(\App\Enums\FileTypeEnum::VIDEO->value)
                                <a href="{{ $file->url }}" class="btn btn-sm btn-primary  me-2" target="_blank">{{ ucfirst($file->type) }}</a>
                                <form action="{{ route('telegram-bot.files.delete', ['messageId' => $messageId, 'fileId' => $file->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete {{ ucfirst($file->type) }}</button>
                                </form>
                                @break
                        @endswitch
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

