<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private UserRepositoryContract $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

}
