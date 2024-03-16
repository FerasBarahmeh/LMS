<?php

namespace App\Http\Requests;

use App\Models\Lecture;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteLectureRequest extends FormRequest
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
            'password' => ['required', 'current_password'],
            'id' => ['required', Rule::exists(Lecture::class)],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('lecture')
        ]);
    }
}
