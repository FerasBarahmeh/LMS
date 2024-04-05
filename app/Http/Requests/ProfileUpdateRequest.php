<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\NoSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:127'],
            'last_name' => ['nullable', 'string', 'max:127'],
            'username' => ['required', 'string', 'max:30', new NoSpaces, Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['required' , 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['nullable', 'numeric', 'digits:10'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->generateNameFromParts();
    }

    protected function generateNameFromParts(): void
    {
        $name = $this->input('first_name') . ' ' . $this->input('last_name');
        $this->merge(['name' => $name]);
    }
}
