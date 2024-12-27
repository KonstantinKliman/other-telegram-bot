<?php

namespace App\Services\Interfaces;

use App\Models\Button;

interface ButtonServiceInterface
{
    public function getById(int $id) : Button;

    public function getAllAvailableMessages();

    public function create(array $data);

    public function update(int $id, array $data);
}
