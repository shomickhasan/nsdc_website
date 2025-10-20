<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'loan_name' => 'required|min:3|max:255'
        ];
    }
}
