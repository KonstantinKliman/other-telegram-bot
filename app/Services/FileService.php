<?php

namespace App\Services;

use App\Models\Message;
use App\Services\Interfaces\FileServiceInterface;

class FileService implements FileServiceInterface
{
    public function getAllByMessage(Message $message)
    {
        return $message->files()->get();
    }
}
