<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'date' => 'required|date_format:Y-m-d',
            'remarks' => 'nullable',
            'route_id' => 'required|exists:routes,id',
            'courier_id' => 'required|exists:couriers,id',
        ];

        if ($this->isMethod('post')) {
            // Apply the required rule for order_ids only during create action
            $rules['order_ids'] = 'required|array';
            $rules['order_ids.*'] = 'exists:orders,id';
        } else {
            $rules['order_ids'] = 'nullable|array';
            $rules['order_ids.*'] = 'exists:orders,id';
        }

        return $rules;

    }
}
