<?php

namespace App\Services\Interfaces;

use App\Models\Message;
use Illuminate\Http\UploadedFile;

interface FileServiceInterface
{
    public function getAllByMessage(Message $message);

    public function getMessageById(int $id);

    public function uploadFileAndAttachToMessage(UploadedFile $file, int $messageId);

    public function deleteFileAndDetachFromMessage(int $messageId, int $fileId);
}
