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
        $this->clearButtons();

        $this->menuText("Start message here!")
            ->addButtonRow(InlineKeyboardButton::make("Button1", callback_data: "null@callcall"))
            ->addButtonRow(InlineKeyboardButton::make("Button2", callback_data: "null@callcall"))
            ->addButtonRow(InlineKeyboardButton::make("Button3", callback_data: "null@callcall"))
            ->addButtonRow(InlineKeyboardButton::make("Button4", callback_data: "null@callcall"))
            ->addButtonRow(InlineKeyboardButton::make("Button5", callback_data: "null@callcall"))
            ->showMenu();
    }

    public function callcall(Nutgram $bot)
    {
        $this->clearButtons();

        $this->menuText("Another message here!")
            ->addButtonRow(InlineKeyboardButton::make("Button6", callback_data: "null@finishCallback"))
            ->addButtonRow(InlineKeyboardButton::make("Button7", callback_data: "null@finishCallback"))
            ->addButtonRow(InlineKeyboardButton::make("Button8", callback_data: "null@finishCallback"))
            ->addButtonRow(InlineKeyboardButton::make("Button9", callback_data: "null@finishCallback"))
            ->addButtonRow(InlineKeyboardButton::make("Button10", callback_data: "null@finishCallback"))
            ->showMenu();
    }

    public function finishCallback(Nutgram $bot)
    {
        $this->clearButtons();

        $bot->sendMessage("Final message here!");

        $this->end();
    }
}
