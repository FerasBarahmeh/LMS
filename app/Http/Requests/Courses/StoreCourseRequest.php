<?php

namespace App\Http\Requests\Courses;

use App\Enums\Semesters;
use App\Models\AcademicSubject;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', Rule::unique(Course::class)],
            'semester' => ['required', Rule::enum(Semesters::class)],
            'academic_subject_id' => ['required', Rule::exists(AcademicSubject::class, 'id')],
            'user_id' => ['required', Rule::exists(User::class, 'id')],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
