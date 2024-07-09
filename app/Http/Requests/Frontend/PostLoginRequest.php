<?php

namespace App\Http\Requests\Frontend;

use App\Rules\PasswordCorrectRule;
use App\Rules\UserLoginEnableRule;
use Illuminate\Foundation\Http\FormRequest;

class PostLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required', 
                'min:6',
                new UserLoginEnableRule($this->email, $this->password),
                // new PasswordCorrectRule($this->email, $this->password)
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please fill user email.',
            'password.required' => 'Please fill user password.',
        ];
    }
}


