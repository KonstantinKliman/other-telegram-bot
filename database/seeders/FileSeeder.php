<?php

namespace Database\Seeders;

use App\Enums\FileTypeEnum;
use App\Models\File;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    private const FILE = [
        'type' => FileTypeEnum::VIDEO->value,
        'path' => 'assets/files/Cut_2.mp4'
    ];

    public function run(): void
    {
        $file = File::query()->create(self::FILE);

        $message = Message::query()->where(['id' => 2])->first();
        $message->files()->attach($file->id);
    }
}
