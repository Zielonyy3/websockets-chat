<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class MessageCreateDto extends DataTransferObject
{
    public int $receiver_id;
    public int $sender_id;
    public string $message;
}
