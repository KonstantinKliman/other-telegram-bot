@props(['file'])

<button type="button" class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#telegramBotAttachedFileModal-{{ $file->id }}">
    {{ $file->type }}
</button>

<div class="modal fade" id="telegramBotAttachedFileModal-{{ $file->id }}" tabindex="-1" aria-labelledby="telegramBotAttachedFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="telegramBotAttachedFileModalLabel">{{ $file->type }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @switch($file->type)
                    @case(\App\Enums\FileTypeEnum::PHOTO->value)
                        <img src="{{ $file->path }}" alt="">
                    @break
                    @case(\App\Enums\FileTypeEnum::VIDEO->value)
                        <video src="{{ asset($file->path) }}"></video>
                    @break
                @endswitch
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

