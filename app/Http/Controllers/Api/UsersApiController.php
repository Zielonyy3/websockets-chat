<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Http\Request;

class UsersApiController extends Controller
{
    private UserRepositoryContract $userRepository;
    private UserServiceContract $userService;

    public function __construct(UserRepositoryContract $userRepository, UserServiceContract $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function getAllUsers(Request $request)
    {
        $receiverId = $request->input('receiver_id');
        $user = $this->userService->getAllWithLastMessage($receiverId);
        return response()->json($user, 200);
    }

    public function getAllUsers2()
    {
        $senderId = 1;
        $user = $this->userService->getAllWithLastMessage($senderId);
        return response()->json($user, 200);
    }
}
