<?php

namespace App\Rules;

use App\Constant;
use App\Models\Members;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserLoginEnableRule implements Rule
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
        if($member){
            if(Hash::check($this->password, $member->password)){
                return !($member->status == Constant::MEMBER_EMAIL_UNVERIFY);
            }
        }
        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your account is not activate. Please go to email and activate account.';
    }
}
