<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|min:3|max:100',
            'title' => 'required|string|min:3|max:100',
            'email' => [
                'nullable',
                Rule::unique('contacts')->ignore($this->id),
            ],
            'mobile' => 'required|min:9|max:50',
            'remarks' => 'nullable|string',
        ];
    }
}
