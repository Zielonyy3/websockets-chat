<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private UserRepositoryContract $userRepository;


    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $users = $this->userRepository->all();
        return view('chat.index', compact('users'));
    }

    public function sendMail(User $user)
    {
        event(new Registered($user));
    }
}
