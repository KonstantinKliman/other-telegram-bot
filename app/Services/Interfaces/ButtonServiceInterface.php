<?php

namespace App\Services\Interfaces;

use App\Models\Button;

interface ButtonServiceInterface
{
    public function getById(int $id) : Button;

    public function getAll();
}
