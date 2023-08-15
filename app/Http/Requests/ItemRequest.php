<?php

namespace App\Http\Requests;

use App\Services\UploadService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class ItemRequest extends FormRequest
{
    public function __construct(private UploadService $uploadService)
    {

    }

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
            'status' => 1
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
            'title' => 'required|string|min:5|max:255',
            'description' => 'required',
            'target' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'area' => 'nullable|numeric',
            'price' => 'required|numeric',
            'available_from' => 'required|date',
            'year_built' => 'nullable|numeric',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_name' => 'nullable|string|max:50',
            'contact_email' => 'nullable|string|email|max:50',
            'contact_phone' => 'nullable|numeric',
            'air_condition' => 'nullable',
            'balcony' => 'nullable',
            'free_parking' => 'nullable',
            'central_heating' => 'nullable',
            'window_covering' => 'nullable',
            'security' => 'nullable',
            'gym' => 'nullable',
            'alarm' => 'nullable',
            'garage' => 'nullable',
            'swimming_pool' => 'nullable',
            'laundry_room' => 'nullable',
            'wifi' => 'nullable',
            'image' => 'nullable',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->any()) {
                    logger('info', ['Validation failed', 'errors' => $validator->errors()]);
                    $this->uploadService->deleteTempFiles();
                }
            }
        ];
    }
//    /**
//     * Handle a failed validation attempt.
//     *
//     * @param \Illuminate\Contracts\Validation\Validator $validator
//     * @throws \Illuminate\Http\Exceptions\HttpResponseException
//     */
//    protected function failedValidation(Validator $validator)
//    {
//
//        // logger('error', ['failedValidation']);
//    }
}
