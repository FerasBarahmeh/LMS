<?php

namespace App\Http\Requests;

use App\Models\Education;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditEducationRequest extends FormRequest
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
            'id' => ['required', Rule::exists(Education::class)],
            'education_name' => ['required', 'max:255', 'string'],
            'organization_name' => ['required', 'max:255', 'string'],
            'start_date' => ['required', 'date', 'before:' . now()->format('n/j/Y'), 'before:finish_date'],
            'finish_date' => ['required', 'date', 'before:' . now()->format('n/j/Y'), 'after:start_date'],
            'description' => ['required', 'max:255'],
            'user_id' => ['required', Rule::exists(User::class, 'id')],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'start_date' => dateToDBFormat($this->start_date),
            'finish_date' => dateToDBFormat($this->finish_date),
            'user_id' => auth()->id(),
            'id' => $this->route('education'),
        ]);
    }

}
