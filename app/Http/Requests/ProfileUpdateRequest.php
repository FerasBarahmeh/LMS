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
            'first_name' => ['required_without:last_name', 'string', 'max:127'],
            'last_name' => ['required_without:first_name', 'string', 'max:127'],
            'username' => ['required', 'string', 'max:30', new NoSpaces, Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['required' , 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'designation' => ['nullable', 'string', 'max:150'],
            'website' => ['nullable', 'string', 'url'],
            'phone' => ['nullable', 'numeric', 'digits:10'],
            'about' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->mergeName();
    }

    public function mergeName(): void
    {
        if ($this->input('name') !== null) {
            $this->processNameInput();
        } else {
            $this->generateNameFromParts();
        }
    }

    protected function processNameInput(): void
    {
        $name = $this->input('name');
        $parts = explode(' ', $name);
        $firstName = array_shift($parts);
        $lastName = end($parts);

        $this->merge(['first_name' => $firstName]);
        $this->merge(['last_name' => $lastName]);
    }

    protected function generateNameFromParts(): void
    {
        $name = $this->input('first_name') . ' ' . $this->input('last_name');
        $this->merge(['name' => $name]);
    }
}
