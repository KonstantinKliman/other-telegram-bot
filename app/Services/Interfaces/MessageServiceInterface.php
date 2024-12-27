<?php

namespace App\Services\Interfaces;

use App\Enums\MessageTypeEnum;

interface MessageServiceInterface
{
    public function getMessageByType(MessageTypeEnum $messageTypeEnum);

    public function getAllMessages();

    public function update(int $id, array $data);
}
