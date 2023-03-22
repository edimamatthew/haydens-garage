<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlockedSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today'],
            'slot_id' => ['nullable'], // Possibly add validation to check that the slot_id is in the DB
        ];
    }
}
