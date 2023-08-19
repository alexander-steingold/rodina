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
        return [
            'date' => 'required|date_format:Y-m-d',
            'route_id' => 'required|exists:routes,id',
            'courier_id' => 'required|exists:couriers,id',
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
        ];
    }
}
