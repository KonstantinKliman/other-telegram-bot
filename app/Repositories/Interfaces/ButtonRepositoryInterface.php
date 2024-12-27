<?php

namespace App\Repositories\Interfaces;

use App\Models\Button;

interface ButtonRepositoryInterface
{
    public function getById(int $id) : Button;

    public function getAll();

    public function create(mixed $text, mixed $nextMessageId);

    public function update(Button $button, string $text);
}
