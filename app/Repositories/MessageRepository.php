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

    public function create(string $text)
    {
        Message::query()->create([
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
            'text' => $text
        ]);
    }

    public function delete(int $id)
    {
        Message::query()->where([
            'id' => $id
        ])->delete();
    }

    public function getAllAvailableMessages()
    {
        return Message::query()->where([
            'type' => MessageTypeEnum::SECOND_MESSAGE->value,
        ])->get();
    }

    public function attachFileToMessage(Message $message, int $fileId)
    {
        $message->files()->attach($fileId);
    }

    public function detachFileFromMessage(Message $message, int $fileId)
    {
        $message->files()->detach($fileId);
    }
}
