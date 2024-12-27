<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'type',
        'text'
    ];

    public function buttons()
    {
        return $this->hasMany(Button::class, 'message_id');
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'file_message', 'message_id', 'file_id');
    }
}
