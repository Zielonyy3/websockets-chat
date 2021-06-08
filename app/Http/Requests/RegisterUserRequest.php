<?php

namespace App\Http\Requests;

use App\Dtos\UserCreateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }


    public function data(): UserCreateDto
    {
        return new UserCreateDto([
            'name'  => $this->input('name'),
            'email'  => $this->input('email'),
            'password'  => Hash::make($this->input('password')),
        ]);
    }
}
