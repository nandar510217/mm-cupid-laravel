<?php

namespace App\Rules;

use App\Models\Members;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PasswordCorrectRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $email;
    private $password;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $member = Members::where('email', $this->email)->first();
        if($member) {
            if(!Hash::check($this->password, $member->password)) {
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password you enter is incorrect.';
    }
}
