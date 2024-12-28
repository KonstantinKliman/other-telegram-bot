<?php

namespace App\Repositories\Interfaces;

use App\Models\File;

interface FileRepositoryInterface
{
    public function create(string $filePath, string $fileType, string $fileUrl) : File;

    public function getById(int $fileId);

    public function delete(File $file);
}
