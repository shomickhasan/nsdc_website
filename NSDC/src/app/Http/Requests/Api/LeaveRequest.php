<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LeaveRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

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
   
    public function rules(): array
    {
        return [
            'leave_type' => 'required|integer',
            'note' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }
}
