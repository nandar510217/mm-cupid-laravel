<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class PostRegisterRequest extends BaseFormRequest
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
            'member-id' => [
                'required',
                'integer',
                Rule::exists('members', 'id')
            ],
            'upload1' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
            'upload2' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
            'upload3' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
            'upload4' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
            'upload5' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
            'upload6' => [
                'nullable',
                'mimes:jpg,png,gif',
            ],
        ];
    }

    public function message(){
        return [
            'id.required' => 'Member id does not contain.',
            'id.exists' => 'Member id does not exit in our database.',
            'upload1.mimes' => 'The photo you upload1 is wrong extension.',
            'upload2.mimes' => 'The photo you upload2 is wrong extension.',
            'upload3.mimes' => 'The photo you upload3 is wrong extension.',
            'upload4.mimes' => 'The photo you upload4 is wrong extension.',
            'upload5.mimes' => 'The photo you upload5 is wrong extension.',
            'upload6.mimes' => 'The photo you upload6 is wrong extension.',

        ];
    }
}
