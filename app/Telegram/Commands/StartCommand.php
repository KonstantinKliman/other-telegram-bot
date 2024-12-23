<?php

namespace App\Telegram\Commands;

use App\Telegram\Conversations\StartConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class StartCommand extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'A lovely description.';

    public function handle(Nutgram $bot): void
    {
        StartConversation::begin($bot);
    }
}
