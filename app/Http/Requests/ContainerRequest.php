<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContainerRequest extends FormRequest
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
        $action = $this->isMethod('post') ? 'create' : 'edit';
        $this->merge([
            'user_id' => auth()->user()->id,
            'action' => $action
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            'cid' => [
                'required',
                Rule::unique('containers')->ignore($this->id),
            ],
            'company' => 'nullable|string|min:3|max:50',
            'country_id' => 'required',
            'order_date' => 'nullable|date_format:Y-m-d',
            'departure_date' => 'nullable|date_format:Y-m-d',
            'arrival_date' => 'nullable|date_format:Y-m-d',
            'remarks' => 'nullable|string|min:3|max:50',
            'weight' => 'nullable|numeric',
            'user_id' => 'required',
            'action' => 'required',
        ];

        if ($this->isMethod('post')) {
            // Apply the required rule for order_ids only during create action
            $rules['barcode_ids'] = 'required|array';
            $rules['barcode_ids.*'] = 'exists:barcodes,id';
        } else {
            $rules['barcode_ids'] = 'nullable|array';
            $rules['barcode_ids.*'] = 'exists:orders,id';
        }

        return $rules;
    }
}
