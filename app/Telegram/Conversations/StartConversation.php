<?php

namespace App\Telegram\Conversations;

use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

class StartConversation extends InlineMenu
{
    public function start(Nutgram $bot)
    {
        $this->menuText("مرحبا بكم في بوط الوكلاء Linebet partners")
            ->addButtonRow(InlineKeyboardButton::make("الحصول على حساب ديمو (حساب تجريبي)؟", callback_data: "null@button1"))
            ->addButtonRow(InlineKeyboardButton::make("التسجيل في حساب الوكلاء والحصول على بروموكاد خاص بيك.", callback_data: "null@button2"))
            ->showMenu();
    }

    public function button1(Nutgram $bot)
    {
        $this->clearButtons();

        $bot->sendMessage("Waiting video");

        $this->end();
    }

    public function button2(Nutgram $bot)
    {
        $this->clearButtons();

        $bot->sendMessage("1.للحصول على حساب ديمو. يجب :\n\n
إرسال قناتك\n\n
2 . 5 تسجيلات مع ايداع بالبرومو كود الخاص بك.\n\n");

        $this->end();
    }
}
