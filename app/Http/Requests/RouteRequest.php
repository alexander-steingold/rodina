<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RouteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'number' => [
                'required',
                Rule::unique('routes')->ignore($this->id),
            ],
            'title' => [
                'required',
                Rule::unique('routes')->ignore($this->id),
            ],
            'description' => 'nullable|string|min:3|max:50',
        ];
    }
}
