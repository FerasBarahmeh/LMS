<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateCourseImageRequest extends FormRequest
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
            'course_image' => [
                'required',
                File::image()
                    ->max('3mb'),
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('course')]);
    }
}
