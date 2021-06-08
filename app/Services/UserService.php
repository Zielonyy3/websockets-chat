<?php

namespace App\Services;

use App\Repositories\Contracts\MessageRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;

class UserService implements UserServiceContract
{
    private UserRepositoryContract $userRepository;
    private MessageRepositoryContract $messageRepository;

    public function __construct(UserRepositoryContract $userRepository, MessageRepositoryContract $messageRepository)
    {
        $this->userRepository = $userRepository;
        $this->messageRepository = $messageRepository;
    }

    public function getAllWithLastMessage(int $receiverId)
    {
        $users = $this->userRepository->all();
        foreach ($users as $user) {
            $user->last_message = $this->messageRepository->getLastMessageBySenderAndReceiver($receiverId, $user->getKey());
        }
        return $users;
    }
}
