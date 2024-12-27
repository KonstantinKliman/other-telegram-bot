<?php

namespace App\Repositories;

use App\Models\Button;
use App\Repositories\Interfaces\ButtonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ButtonRepository implements ButtonRepositoryInterface
{

    public function getById(int $id): Button
    {
        return Button::query()->where([
            'id' => $id
        ])->first();
    }

    public function getAll() : Collection
    {
        return Button::query()->get();
    }
}
