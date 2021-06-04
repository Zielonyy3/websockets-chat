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

    public function getAllUsers()
    {
        $user = $this->userRepository->all();
        return response()->json($user, 200);
    }
}
