<?php

namespace App\Http\Requests;

use App\Dtos\MessageGetDto;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\DataTransferObject;

class MessageGetRequest extends FormRequest
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
        ];
    }


    public function data(): MessageGetDto
    {
        return new MessageGetDto([
            'receiver_id' => $this->input('receiver_id'),
            'sender_id' => $this->input('sender_id'),
        ]);
    }
}

