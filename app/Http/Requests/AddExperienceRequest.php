<?php

namespace App\Http\Requests;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddExperienceRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'job_title' => ['required', 'max:255', 'string'],
            'company_name' => ['required', 'max:255', 'string'],
            'joined_date' => ['required', 'date', 'after:1/1/1990', 'before:' . now()->format('n/j/Y'), 'before:leave_date' ],
            'leave_date' => ['required', 'date', 'after:1/1/1990', 'before:' . now()->format('n/j/Y'), 'after:joined_date'],
            'job_description' => ['required', 'max:255'],
            'user_id' => ['required', Rule::exists(User::class, 'id')],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'joined_date' => dateToDBFormat($this->joined_date),
            'leave_date' => dateToDBFormat($this->leave_date),
            'user_id' => auth()->id()
        ]);
    }
}
