<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\UpdateRequest;
use App\Services\Interfaces\MessageServiceInterface;

class MessageController extends Controller
{
    public function __construct(
        private readonly MessageServiceInterface $messageService
    )
    {
    }

    public function index()
    {
        return view('admin.telegram-bot.messages.index', [
            'messages' =>  $this->messageService->getAllMessages()
        ]);
    }

    public function update(int $id, UpdateRequest $request)
    {
        $this->messageService->update($id, $request->validated());
        return redirect()
            ->route('telegram-bot.messages.index')
            ->with('status', 'Message successfully updated');
    }
}
