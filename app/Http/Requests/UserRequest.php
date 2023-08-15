<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status' => ($this->status ? 'active' : 'inactive'),
        ]);

        // Only merge password for create requests (POST)
        if ($this->isMethod('post')) {
            $this->merge([
                'password' => $this->password ? Hash::make($this->password) : ''
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $passwordRules = $this->isMethod('post') ? 'required|min:6|max:100' : 'nullable';

        return [
            'name' => 'required|string|min:3|max:50',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id),
            ],
            'password' => $passwordRules,
            'mobile' => 'required|min:9|max:50',
            'remarks' => 'nullable|string',
            'status' => 'nullable|string',
        ];
    }

}
