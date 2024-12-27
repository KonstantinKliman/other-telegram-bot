<?php

namespace App\Services;

use App\Enums\MessageTypeEnum;
use App\Models\Button;
use App\Repositories\Interfaces\ButtonRepositoryInterface;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Services\Interfaces\ButtonServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ButtonService implements ButtonServiceInterface
{
    public function __construct(
        private readonly ButtonRepositoryInterface $buttonRepository,
        private readonly MessageRepositoryInterface $messageRepository
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

    public function getAllAvailableMessages()
    {
        return $this->messageRepository->getAllAvailableMessages();
    }

    public function create(array $data): void
    {
        if (!$this->isAvailableMessage($data['nextMessageId'])) {
            abort(400, 'Wrong message id');
        }

        $this->buttonRepository->create(
            $data['text'],
            $data['nextMessageId']
        );
    }

    private function isAvailableMessage(int $nextMessageId) : bool
    {
        $message = $this->messageRepository->getById($nextMessageId);
        return $message->type == MessageTypeEnum::SECOND_MESSAGE->value;
    }

    public function update(int $id, array $data)
    {
        $button = $this->buttonRepository->getById($id);
        $this->buttonRepository->update($button, $data['text']);
    }
}
