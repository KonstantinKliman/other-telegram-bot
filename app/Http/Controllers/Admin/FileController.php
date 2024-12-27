<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadRequest;
use App\Services\FileService;
use App\Services\Interfaces\FileServiceInterface;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct(
        private readonly FileServiceInterface $fileService
    )
    {
    }

    public function create(int $id)
    {
        return view('admin.telegram-bot.files.create', [
            'message' => $this->fileService->getMessageById($id)
        ]);
    }

    public function store(UploadRequest $request, int $messageId)
    {
        $this->fileService->uploadFileAndAttachToMessage($request->file('file'), $messageId);
        return redirect()->route('telegram-bot.messages.index')->with('status', 'File successfully uploaded');
    }

    public function delete(int $messageId, int $fileId)
    {
        $this->fileService->deleteFileAndDetachFromMessage($messageId, $fileId);
        return redirect()->route('telegram-bot.messages.index')->with('status', 'File successfully deleted');
    }
}
