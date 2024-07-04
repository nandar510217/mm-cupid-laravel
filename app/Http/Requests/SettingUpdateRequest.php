<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingUpdateRequest extends FormRequest
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
            'point' => [
                'required',
                'integer', 
            ],
            'company_name' => [
                'required',
            ],
            'company_email' => [
                'required',
                'email',
            ], 
            'company_phone' => [
                'required',
            ], 
            'company_address' => [
                'required',
            ], 
            'company_logo' => [
                'nullable',
                'file',
                'mimes:jpg,png,gif',
            ]
        ];
    }

    public function messages()
    {
        return [
            'point.required'           => 'Please fill point.',
            'point.integer'            => 'Point must be numeric.',
            'company_name.required'    => 'Please fill company name.',
            'company_email.required'   => 'Please fill company email.',
            'company_email.email'      => 'Company email must be email fomat.',
            'company_phone.required'   => 'Please fill company phone.',
            'company_address.required' => 'Please fill company address.',
            // 'company_logo.mimes'       => 'Company logo must be a file of type: jpg, png, gif.',
            'company_logo.mimes'       => 'Company logo must be a file of type: jpg, png, gif.',
        ];
    }
}
