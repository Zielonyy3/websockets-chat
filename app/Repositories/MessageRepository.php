<?php

namespace App\Repositories;

use App\Dtos\MessageGetDto;
use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MessageRepository extends BaseRepository implements MessageRepositoryContract
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function getLastMessageBySenderAndReceiver(int $receiverId, int $senderId)
    {
        return $this->model->where('receiver_id', '=', $receiverId)
            ->where('sender_id', '=', $senderId)
            ->latest()
            ->first();
    }

    public function getMessages(MessageGetDto $messageGetDto): Collection
    {
        $messages = $this->model->newQuery();

        $messages->where(function (Builder $query) use ($messageGetDto) {
            $query->whereHas('receiver', function (Builder $query) use ($messageGetDto) {
                $query->whereKey($messageGetDto->receiver_id);
            });
            $query->whereHas('sender', function (Builder $query) use ($messageGetDto) {
                $query->whereKey($messageGetDto->sender_id);
            });
        });

        $messages->orWhere(function (Builder $query) use ($messageGetDto) {
            $query->whereHas('receiver', function (Builder $query) use ($messageGetDto) {
                $query->whereKey($messageGetDto->sender_id);
            });
            $query->whereHas('sender', function (Builder $query) use ($messageGetDto) {
                $query->whereKey($messageGetDto->receiver_id);
            });
        });

        return $messages->get();
    }
}
