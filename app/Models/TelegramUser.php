<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    protected $table = 'telegram_users';

    protected $fillable = [
        'chat_id',
        'username',
        'first_name',
        'last_name'
    ];

    public function userData()
    {
        return $this->hasOne(TelegramUserData::class);
    }
}
