<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OutletRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status_code' => 401,
            'status' => 'error',
            'error' => $validator->errors()->all(),
            'error_code' => [401],
            'success' => [],
            'success_code' => [],
            'data' => [],
        ], 401));
    }
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'outlet_name' => 'required|string|min:3',
            'owner_name' => 'required|string|min:3',
            'owner_phone' => 'required|string|min:10|max:15',
            'outlet_address' => 'required|string',
            'owner_email' => 'nullable|string|email',
            'second_contact_person_name' => 'nullable|string',
            'designation' => 'nullable|string',
            'second_person_phone' => 'nullable|string|min:10|max:15',
            'outlet_geo_location_lat' => 'nullable|string',
            'outlet_geo_location_lon' => 'nullable|string',
            'national_id' => 'required|integer',
            'status' => 'required',
            // 'outlet_picture' => 'nullable | mimes:jpg,png,jpeg',
            // 'outlet_owner_picture' => 'nullable | mimes:jpg,png,jpeg',
            'outlet_picture' => 'nullable|string', // or whatever rules you need
            'outlet_owner_picture' => 'nullable|string',
        ];
    }
}
