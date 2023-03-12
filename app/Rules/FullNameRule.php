<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullNameRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $network;
    public function __construct($network = NULL)
    {
        $this->network = $network;
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
        if(strpos($value, '\\')){
            return false;
        }
        if(preg_match("/[0-9-!$@#%^&*()_+|~=`{\}[\]:;'<>?,.\/\"]/",$value)){
            return false;
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
        return 'Họ và tên không chính xác.';
    }
}
