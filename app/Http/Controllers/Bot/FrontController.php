<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Nutgram;

class FrontController extends Controller
{
    public function __invoke(Nutgram $bot): void
    {
        try {
            $bot->run();
        } catch (\Throwable $exception) {
            Log::warning($exception->getMessage());
        }
    }
}
