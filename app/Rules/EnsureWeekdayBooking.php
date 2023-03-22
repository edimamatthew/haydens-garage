<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnsureWeekdayBooking implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Convert the selected date to a day of the week which returns the number of the week. 1 => Monday. 7 => Sunday
        $dayOfWeek = date('N', strtotime($value));
        if ($dayOfWeek > 5) {
            $fail('The selected date must be a weekday.');
        }
    }
}
