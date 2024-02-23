<?php

namespace App\Http\Requests;

use App\Models\AvailablePlatform;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SocialMediaAccountsRequest extends FormRequest
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
            'username' => ['required', 'max:30'],
            'user_id' => ['required', Rule::exists(User::class, 'id')],
            'available_platform_id' => ['required', Rule::exists(AvailablePlatform::class, 'id')],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => (string)auth()->id(),
            'available_platform_id' => $this->route('platform'),
        ]);
    }
}
