<?php

namespace App\Services;

use App\Models\Button;
use App\Repositories\Interfaces\ButtonRepositoryInterface;
use App\Services\Interfaces\ButtonServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ButtonService implements ButtonServiceInterface
{
    public function __construct(
        private readonly ButtonRepositoryInterface $buttonRepository
    )
    {
    }

    public function getById(int $id) : Button
    {
        return $this->buttonRepository->getById($id);
    }

    public function getAll() : Collection
    {
        return $this->buttonRepository->getAll();
    }
}
