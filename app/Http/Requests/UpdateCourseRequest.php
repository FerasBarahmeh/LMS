<?php

namespace App\Http\Requests;

use App\Enums\Semesters;
use App\Models\AcademicSubject;
use App\Models\Course;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
            'id' => ['required', 'numeric', 'gt:0', Rule::exists(Course::class)],
            'name' => ['required', Rule::unique(Course::class)->ignore($this->route('course'))],
            'description' => ['nullable'],
            'semester' => [Rule::enum(Semesters::class)],
            'academic_subject_id' => [Rule::exists(AcademicSubject::class, 'id')],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge(input: ['id' => $this->route('course')]);
    }
}
