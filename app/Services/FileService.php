<?php

namespace App\Services;

use App\Models\Message;
use App\Repositories\Interfaces\FileRepositoryInterface;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService implements FileServiceInterface
{
    public function __construct(
        private readonly MessageRepositoryInterface $messageRepository,
        private readonly FileRepositoryInterface $fileRepository
    )
    {
    }

    private const STORAGE_PATH = 'storage/';

    public function getAllByMessage(Message $message)
    {
        return $message->files()->get();
    }


    public function getMessageById(int $id)
    {
        return $this->messageRepository->getById($id);
    }

    public function uploadFileAndAttachToMessage(UploadedFile $file, int $messageId)
    {
        $fileName = $file->store();
        $filePath = self::STORAGE_PATH . $fileName;
        $fileType = explode('/', $file->getMimeType())[0];
        $fileUrl = Storage::url($fileName);

        $message = $this->messageRepository->getById($messageId);
        $file = $this->fileRepository->create($filePath, $fileType, $fileUrl);

        $this->messageRepository->attachFileToMessage($message, $file->id);
    }

    public function deleteFileAndDetachFromMessage(int $messageId, int $fileId)
    {
        $file = $this->fileRepository->getById($fileId);
        $message = $this->messageRepository->getById($messageId);

        $filePath = str_replace(self::STORAGE_PATH , '', $file->path);
        Storage::delete($filePath);

        $this->messageRepository->detachFileFromMessage($message, $file->id);
        $this->fileRepository->delete($file);
    }
}
