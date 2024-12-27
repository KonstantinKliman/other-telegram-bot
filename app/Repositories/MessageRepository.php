<?php

namespace App\Repositories;

use App\Enums\MessageTypeEnum;
use App\Models\Message;
use App\Repositories\Interfaces\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{

    public function getMessageByType(MessageTypeEnum $messageTypeEnum) : Message
    {
        return Message::query()->where([
            'type' => $messageTypeEnum->value
        ])->first();
    }

    public function getAll()
    {
        return Message::query()->get();
    }

    public function update(Message $message, string $newText)
    {
        $message->update([
            'text' => $newText
        ]);
    }

    public function getById(int $id)
    {
        return Message::query()->where([
            'id' => $id
        ])->first();
    }
}
