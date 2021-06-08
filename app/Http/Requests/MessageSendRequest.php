<?php

namespace App\Http\Requests;

use App\Dtos\MessageCreateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MessageSendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'receiver_id' => ['required', 'exists:users,id'],
            'sender_id' => ['required', 'exists:users,id'],
            'text' => 'string',
        ];
    }

    public function data(): MessageCreateDto
    {
        return new MessageCreateDto([
            'receiver_id' => $this->input('receiver_id'),
            'text' => $this->input('text'),
            'sender_id' => $this->input('sender_id'),
        ]);
    }
}
