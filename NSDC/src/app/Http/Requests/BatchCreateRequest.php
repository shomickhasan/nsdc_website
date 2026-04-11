<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id'   => 'required|exists:courses,id',
            'batch_name'  => 'required|string|max:255',
            'batch_code'  => 'required|string|max:255|unique:batch_models,batch_code',
            'slug'        => 'nullable|string|max:255|unique:batch_models,slug',
            'status'      => 'required|in:0,1,2,3',
            'open_at'     => 'nullable|date',
            'complete_at' => 'nullable|date|after_or_equal:open_at',
        ];
    }
    public function messages(): array
    {
        return [
            'course_id.required' => 'Please select a course',
            'course_id.exists'   => 'Selected course is invalid',

            'batch_name.required' => 'Batch name is required',

            'batch_code.required' => 'Batch code is required',
            'batch_code.unique'   => 'Batch code already exists',

            'slug.unique' => 'Slug already exists',

            'status.required' => 'Status is required',

            'complete_at.after_or_equal' => 'Complete date must be after open date',
        ];
    }
}
