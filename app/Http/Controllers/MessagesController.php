<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageSendRequest;
use App\Repositories\Contracts\MessageRepositoryContract;

class MessagesController extends Controller
{
    private MessageRepositoryContract $messageRepository;

    public function __construct(MessageRepositoryContract $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function sendMessage(MessageSendRequest $request)
    {
        $message = $this->messageRepository->create($request->data()->toArray());
        return response()->json($message, 200);
    }
}
