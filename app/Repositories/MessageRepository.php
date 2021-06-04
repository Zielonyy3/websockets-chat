<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryContract;

class MessageRepository extends BaseRepository implements MessageRepositoryContract
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
}
