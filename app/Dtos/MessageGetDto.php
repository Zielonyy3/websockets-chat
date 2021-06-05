<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class MessageGetDto extends DataTransferObject
{
    public int $receiver_id;
    public int $sender_id;
}
