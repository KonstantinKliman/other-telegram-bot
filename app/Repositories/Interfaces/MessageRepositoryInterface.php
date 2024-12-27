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
}
