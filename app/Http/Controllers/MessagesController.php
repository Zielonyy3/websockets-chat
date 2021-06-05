<?php

namespace App\Http\Controllers;

use App\Dtos\MessageGetDto;
use App\Http\Requests\MessageGetRequest;
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

    public function getMessages(MessageGetRequest $request)
    {
        $messages = $this->messageRepository->getMessages($request->data());
        return response()->json($messages, 200);

    }

    public function getMessages2()
    {
        $messageGetDto = new MessageGetDto([
            'receiver_id' => 1,
            'sender_id' => 2,
        ]);
        $messages = $this->messageRepository->getMessages($messageGetDto);
        return response()->json($messages, 200);

    }
}
