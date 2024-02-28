<?php

namespace App\Http\Requests;

use App\Models\Icon;
use App\Models\SocialMediaAccount;
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
            'name' => ['required', 'max:30', Rule::unique(SocialMediaAccount::class)->ignore($id)],
            'username' => ['required'],
            'link' => ['required', 'url'],
            'icon_id' => ['required', Rule::exists(Icon::class, 'id')],
        ];
    }
}
