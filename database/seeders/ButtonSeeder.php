<?php

namespace Database\Seeders;

use App\Enums\MessageTypeEnum;
use App\Models\Button;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ButtonSeeder extends Seeder
{
    private const START_BUTTONS = [
        [
            'text' => "1. التسجيل في حساب الوكلاء والحصول على بروموكاد خاص بيك.",
            'message_id' => 1,
            'next_message_id' => 2
        ],
        [
            'text' => "2.الحصول على حساب ديمو (حساب تجريبي)؟",
            'message_id' => 1,
            'next_message_id' => 3
        ],
        [
            'text' => "3.تفعيل سحب الارباح وربط الحساب",
            'message_id' => 1,
            'next_message_id' => 4
        ],
        [
            'text' => "4.الحصول على موبي كاش",
            'message_id' => 1,
            'next_message_id' => 5
        ],
        [
            'text' => "5.الحصول على خدمه بنكيه",
            'message_id' => 1,
            'next_message_id' => 6
        ]
    ];

    public function run(): void
    {
        foreach (self::START_BUTTONS as $button) {
            Button::query()->create($button);
        }
    }
}
