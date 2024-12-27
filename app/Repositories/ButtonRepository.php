<?php

namespace App\Repositories;

use App\Models\Button;
use App\Repositories\Interfaces\ButtonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ButtonRepository implements ButtonRepositoryInterface
{

    public function getById(int $id): Button
    {
        return Button::query()->where([
            'id' => $id
        ])->first();
    }

    public function getAll() : Collection
    {
        return Button::query()->get();
    }

    public function create(mixed $text, mixed $nextMessageId)
    {
        Button::query()->create([
            'text' => $text,
            'message_id' => 1,
            'next_message_id' => $nextMessageId
        ]);
    }

    public function update(Button $button, string $text)
    {
        $button->update([
            'text' => $text
        ]);
    }
}
