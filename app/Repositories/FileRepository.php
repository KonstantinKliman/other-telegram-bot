<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\Interfaces\FileRepositoryInterface;

class FileRepository implements FileRepositoryInterface
{

    public function create(string $filePath, string $fileType, string $fileUrl) : File
    {
        return File::query()->create([
            'type' => $fileType,
            'path' => $filePath,
            'url' => $fileUrl
        ]);
    }

    public function getById(int $fileId)
    {
        return File::query()->findOrFail($fileId);
    }

    public function delete(File $file)
    {
        $file->delete();
    }
}
