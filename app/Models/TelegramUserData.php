<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramUserData extends Model
{
    protected $table = 'telegram_user_data';

    protected $fillable = [
        'data'
    ];

    public function telegramUser()
    {
        return $this->belongsTo(TelegramUser::class);
    }
}
