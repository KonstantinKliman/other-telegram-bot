@props(['telegramUser'])

<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#telegramUserDataModal-{{ $telegramUser->id }}">
    Click here to see user data
</button>

<div class="modal fade" id="telegramUserDataModal-{{ $telegramUser->id }}" tabindex="-1" aria-labelledby="telegramUserDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="telegramUserDataModalLabel">User data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $telegramUser->userData->data }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

