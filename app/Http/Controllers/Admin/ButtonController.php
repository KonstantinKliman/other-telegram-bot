<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Button\CreateRequest;
use App\Http\Requests\Button\UpdateRequest;
use App\Services\Interfaces\ButtonServiceInterface;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    public function __construct(
        private readonly ButtonServiceInterface $buttonService
    )
    {
    }

    public function index()
    {
        return view('admin.telegram-bot.buttons.index', [
            'buttons' => $this->buttonService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.telegram-bot.buttons.create', [
            'message' => $this->buttonService->getAllAvailableMessages()
        ]);
    }

    public function store(CreateRequest $request)
    {
        $this->buttonService->create($request->validated());
        return redirect()
            ->route('telegram-bot.buttons.index')
            ->with('status', 'Button successfully created');
    }

    public function update(int $id, UpdateRequest $request)
    {
        $this->buttonService->update($id, $request->validated());
        return redirect()
            ->route('telegram-bot.buttons.index')
            ->with('status', 'Button successfully updated');
    }
}
