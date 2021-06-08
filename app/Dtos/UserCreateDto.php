<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class UserCreateDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
}
