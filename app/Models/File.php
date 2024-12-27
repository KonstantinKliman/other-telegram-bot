<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'type',
        'path'
    ];

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'file_message', 'file_id', 'message_id');
    }
}
