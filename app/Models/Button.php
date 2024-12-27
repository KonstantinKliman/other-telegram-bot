<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'buttons';

    protected $fillable = [
        'text',
        'message_id',
        'next_message_id'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }

    public function nextMessage()
    {
        return $this->belongsTo(Message::class, 'next_message_id');
    }
}
