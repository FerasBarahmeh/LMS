<?php

namespace App\Http\Requests;

use App\Models\SocialMediaAccount;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAvailablePlatformRequest extends FormRequest
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
            'name' => ['required', 'max:30', Rule::unique(SocialMediaAccount::class)],
            'username' => ['required'],
            'link' => ['required', 'url', Rule::unique(SocialMediaAccount::class)],
        ];
    }
}
