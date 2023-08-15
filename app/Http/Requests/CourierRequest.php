<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourierRequest extends FormRequest
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
        $this->merge([
            'status' => ($this->status ? 'active' : 'inactive')
        ]);
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
            'car_number' => 'nullable|numeric',
            //'email' => 'required|email|min:5|max:50|unique:customers,email,:id',
            'email' => [
                'nullable',
                Rule::unique('couriers')->ignore($this->id),
            ],
            'phone' => 'nullable|min:9|max:50',
            'mobile' => 'required|min:9|max:50',
            //'pid' => 'nullable|min:9|max:9',
            'pid' => [
                'nullable',
                'min:9',
                'max:9',
                Rule::unique('couriers')->ignore($this->id),
            ],
            'cid' => 'required',
            'remarks' => 'nullable|string',
            'status' => 'required',
        ];
    }
}
