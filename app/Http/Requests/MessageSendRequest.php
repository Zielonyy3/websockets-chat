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
            'message' => 'string',
        ];
    }

    public function data(): MessageCreateDto
    {
        return new MessageCreateDto([
            'receiver_id' => $this->input('receiver_id'),
            'message' => $this->input('message'),
            'sender_id' => 1,
        ]);
    }
}
