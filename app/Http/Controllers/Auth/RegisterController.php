<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    private UserRepositoryContract $userRepository;


    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }


    public function register(RegisterUserRequest $request)
    {
        event(new Registered($user = $this->userRepository->create($request->data()->toArray())));

        $this->guard()->login($user);
        return redirect()->route('home');
    }

}
