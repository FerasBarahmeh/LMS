<?php

namespace App\Http\Requests;

use App\Models\AvailablePlatform;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAvailablePlatformRequest extends FormRequest
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
        $id = $this->route()->platform;
        return [
            'name' => ['required', 'max:30', Rule::unique(AvailablePlatform::class)->ignore($id)],
            'domain' => ['required',  Rule::unique(AvailablePlatform::class)->ignore($id)],
        ];
    }
}
