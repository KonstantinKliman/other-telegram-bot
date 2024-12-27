<?php

namespace App\Repositories\Interfaces;

use App\Enums\MessageTypeEnum;
use App\Models\Message;

interface MessageRepositoryInterface
{
    public function getMessageByType(MessageTypeEnum $messageTypeEnum);

    public function getAll();

    public function update(Message $message, string $newText);

    public function getById(int $id);

    public function create(string $text);

    public function delete(int $id);

    public function getAllAvailableMessages();

    public function attachFileToMessage(Message $message, int $fileId);

    public function detachFileFromMessage(Message $message, int $fileId);
}
