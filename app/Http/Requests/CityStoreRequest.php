<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityStoreRequest extends FormRequest
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
            'city' => [
                'required',
                Rule::unique('cities', 'name')->where(function ($query) {
                    return $query
                    ->whereNull('deleted_at');
                }),
            ]
        ];
    }
    public function messages()
    {
        return [
            'city.required' => 'Please fill city name.',
            'city.unique' => 'The city name you enter is already exit.',
        ];
    }
}