<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'status' => ($this->status ? 'active' : 'inactive')
        ]);
    }


    /**
     * Sanitize the website attribute, remove "http://" or "https://" from the beginning of the URL.
     *
     * @param string|null $website
     * @return string|null
     */
    protected function sanitizeWebsite(?string $website): ?string
    {
        if ($website) {
            // Remove "http://" or "https://" from the beginning of the URL
            return preg_replace('#^https?://#', '', $website);
        }

        return null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'nullable|string|min:3|max:50',
            'country_id' => 'required|numeric',
            'city_id' => 'nullable|numeric',
            'address' => 'nullable|string|min:3|max:100',
            'zip' => 'nullable|string|min:5|max:10',
            //'email' => 'required|email|min:5|max:50|unique:customers,email,:id',
            'email' => [
                'required',
                Rule::unique('customers')->ignore($this->id),
            ],
            'phone' => 'nullable|min:9|max:50',
            'mobile' => 'required|min:9|max:50',
            //'pid' => 'nullable|min:9|max:9',
            'pid' => [
                'nullable',
                'min:9',
                'max:9',
                Rule::unique('customers')->ignore($this->id),
            ],
            'cid' => 'required',
            'remarks' => 'nullable|string',
            'status' => 'nullable|string',
        ];
    }
}
