<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($query) {
                    return $query
                    ->whereNull('deleted_at');
                }),
            ],
            'role' => [
                'required',
                'integer'
            ],
            'password' => [
                'required',
                'min:6',
            ], 
            'con-password' => [
                'required',
                'same:password',
            ]
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Please fill user name.',
            'username.unique' => 'The user name you enter is already exit.',
            'role.required' => 'Please choose user role.',
            'role.integer' => 'User role must be numeric.',
            'password.required' => 'Please fill user password.',
            'password.min' => 'Password must be at least 6 characters.',
            'con-password.required' => 'Please fill confirm password.',
            'con-password.same' => 'Password and confirm password does not match.',
        ];
    }
}
