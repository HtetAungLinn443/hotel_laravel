<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateFormat implements Rule
{
    public function passes($attribute, $value)
    {
        return \DateTime::createFromFormat('Y-m-d', $value) !== false;
    }

    public function message()
    {
        return 'The :attribute must be in the "YYYY-MM-DD" format.';
    }
}
