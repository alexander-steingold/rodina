<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
//        $barcodeValues = $this->input('barcode', []);
//
//        $nonNullBarcodeValues = array_filter($barcodeValues, function ($value) {
//            return $value !== null;
//        });
//
//        if (!empty($nonNullBarcodeValues)) {
//            $prepayment = count($nonNullBarcodeValues) * $this->input('box_price');
//        }

        $prepayment = 0;
        if (!empty($this->input('barcode'))) {
            $prepayment = $this->input('box_price');
        }

        $totalPayment = (int)$this->input('payment') + (int)$prepayment - (int)$this->input('discount');
        //logger('info', [$this->isMethod('post')]);
        $action = $this->isMethod('post') ? 'create' : 'edit';
        $this->merge([
            'total_payment' => $totalPayment,
            'user_id' => auth()->user()->id,
            'action' => $action
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

    /**countries
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|numeric',
            //'courier_id' => 'nullable|numeric',
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'status' => 'required',
            'country_id' => 'required|numeric',
            'city' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:100',
            'email' => 'nullable|email|string|min:3|max:50',
            'phone' => 'nullable|min:9|max:50',
            'mobile' => 'required|min:9|max:50',
            // 'boxes' => 'nullable|numeric',
            'weight_kg' => 'nullable|numeric',
            'weight_gr' => 'nullable|numeric',
            'box_price' => 'nullable|numeric',
            'total_payment' => 'nullable|numeric',
            'payment' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'oid' => 'required',
            'remarks' => 'nullable|string',
            'content' => 'nullable|string',
            'user_id' => 'required',
            'action' => 'required',
            // 'barcode.*' => 'nullable',
            'barcode' => 'nullable',
            'item.*' => 'nullable',
        ];


    }


}
