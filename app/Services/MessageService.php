<?php

namespace App\Services;

use App\Enums\MessageTypeEnum;
use App\Repositories\Interfaces\MessageRepositoryInterface;
use App\Services\Interfaces\MessageServiceInterface;

class MessageService implements MessageServiceInterface
{
    public function __construct(
        private readonly MessageRepositoryInterface $messageRepository
    )
    {
    }

    public function getMessageByType(MessageTypeEnum $messageTypeEnum)
    {
        return $this->messageRepository->getMessageByType($messageTypeEnum);
    }

    public function getAllMessages()
    {
        return $this->messageRepository->getAll();
    }

    public function update(int $id, array $data)
    {
        $message = $this->messageRepository->getById($id);
        $this->messageRepository->update($message, $data['text']);
    }

    public function create(string $text)
    {
        $this->messageRepository->create($text);
    }

    public function delete(int $id)
    {
        $this->messageRepository->delete($id);
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }
}
