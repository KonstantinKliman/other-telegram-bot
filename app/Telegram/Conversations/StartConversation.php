<?php

namespace App\Telegram\Conversations;

use App\Enums\FileTypeEnum;
use App\Enums\MessageTypeEnum;
use App\Services\Interfaces\ButtonServiceInterface;
use App\Services\Interfaces\FileServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use App\Services\Interfaces\TelegramUserServiceInterface;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Internal\InputFile;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

class StartConversation extends InlineMenu
{
    public function __construct(
        private readonly TelegramUserServiceInterface $telegramUserService,
        private readonly MessageServiceInterface $messageService,
        private readonly ButtonServiceInterface $buttonService,
        private readonly FileServiceInterface $fileService,
    )
    {
        parent::__construct();
    }

    public function start(Nutgram $bot)
    {
        $message = $this->messageService->getMessageByType(MessageTypeEnum::START_MESSAGE);
        $buttons = $message->buttons;

        $inlineMenuBuilder = $this->menuText($message->text);
        foreach ($buttons as $button) {
            $inlineMenuBuilder->addButtonRow(InlineKeyboardButton::make($button->text, callback_data: "$button->id@showButtonText"));
        }
        $inlineMenuBuilder->showMenu();
    }

    public function showButtonText(Nutgram $bot)
    {
        $chatId = $bot->user()?->id;

        $buttonId = $bot->callbackQuery()->data;
        $button = $this->buttonService->getById($buttonId);
        $text = $button->nextMessage->text;
        $files = $this->fileService->getAllByMessage($button->nextMessage);

        $this->clearButtons();
        $this->closeMenu();

        foreach ($files as $file) {
            Log::info('Файл для отправки:', [
                'type' => $file->type,
                'path' => $file->path,
            ]);
            switch ($file->type) {
                case FileTypeEnum::IMAGE->value :
                    $bot->sendPhoto(
                        photo: $file->path,
                        chat_id: $chatId,
                    );
                    break;
                case FileTypeEnum::VIDEO->value :
                    $bot->sendVideo(
                        video: $file->path,
                        chat_id: $chatId,
                    );
                    break;
            }
        }

        $bot->sendMessage($text);

        $this->next('finishMessage');
    }

    public function finishMessage(Nutgram $bot)
    {
        $messageFromUser = $bot->message()->text;
        $telegramUser = $bot->user();

        $this->telegramUserService->setUserDataFromMessage($telegramUser, $messageFromUser);

        $text = $this->messageService->getMessageByType(MessageTypeEnum::LAST_MESSAGE);

        $bot->sendMessage($text);

        $this->end();
    }
}
