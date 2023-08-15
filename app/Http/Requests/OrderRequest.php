<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
        // Check if 'boxes' and 'payment' are present in the request
        if ($this->has('boxes') && $this->has('payment')) {
            // Calculate prepayment and total_payment
            $prepayment = $this->input('boxes') * config('app.box_price');
            $totalPayment = $this->input('payment') + $prepayment;

            // Merge the calculated values and user_id into the request
            $this->merge([
                'prepayment' => $prepayment,
                'total_payment' => $totalPayment,
                'user_id' => auth()->user()->id,
            ]);
        }

//        $this->merge([
//            'prepayment' => ($this->boxes * config('app.box_price')),
//            'total_payment' => ($this->payment + $this->prepayment),
//            'user_id' => auth()->user()->id,
//        ]);
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

    /**countries
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|numeric',
            'courier_id' => 'nullable|numeric',
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'status' => 'required',
            'country_id' => 'required|numeric',
            'city' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:100',
            'email' => 'nullable|email|string|min:3|max:50',
            'phone' => 'nullable|min:9|max:50',
            'mobile' => 'required|min:9|max:50',
            'barcode' => 'nullable|string|min:5|max:15',
            'boxes' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'prepayment' => 'nullable|numeric',
            'payment' => 'nullable|numeric',
            'total_payment' => 'nullable|numeric',
            'oid' => 'required',
            'remarks' => 'nullable|string',
            'user_id' => 'required',
            'barcodes.*' => 'required'
        ];
    }
}
