<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HobbyStoreRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('hobbies', 'name')->where(function ($query) {
                    return $query
                    ->whereNull('deleted_at');
                }),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please fill hobby name.',
            'name.unique' => 'The hobby name you enter is already exit.',
        ];
    }
}
