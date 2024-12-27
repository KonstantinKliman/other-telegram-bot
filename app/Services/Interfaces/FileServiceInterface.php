<?php

namespace App\Services\Interfaces;

use App\Models\Message;

interface FileServiceInterface
{
    public function getAllByMessage(Message $message);
}
