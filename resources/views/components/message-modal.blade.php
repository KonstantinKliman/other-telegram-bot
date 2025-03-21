@props(['button'])

<button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#telegramBotButtonModal-{{ $button->id }}" dir="rtl">
    Attached message
</button>

<div class="modal fade" id="telegramBotButtonModal-{{ $button->id }}" tabindex="-1" aria-labelledby="telegramBotButtonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="telegramBotButtonModalLabel">Button : {{ $button->text }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p dir="rtl">{{ $button->nextMessage->text }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

