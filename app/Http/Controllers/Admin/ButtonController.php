<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
