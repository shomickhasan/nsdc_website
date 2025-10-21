<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CourseCreateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'short_des' => 'required|string',
            'long_des' => 'required|string',
            'course_fee' => 'required|numeric|min:0',
            'status' => 'required|integer|in:0,1', // 1 = Active, 0 = Inactive
            'is_show_in_home' => 'required|integer|in:0,1', // 1 = Yes, 0 = No
            'picture' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048', // 2MB max
        ];
    }

    public function messages(): array
{
    return [
        'title.required' => 'The course title is required.',
        'title.string' => 'The course title must be a string.',
        'title.max' => 'The course title may not be greater than 255 characters.',

        'duration.required' => 'The duration is required.',
        'duration.string' => 'The duration must be a string.',
        'duration.max' => 'The duration may not be greater than 255 characters.',

        'short_des.required' => 'The short description is required.',
        'short_des.string' => 'The short description must be a string.',

        'long_des.required' => 'The long description is required.',
        'long_des.string' => 'The long description must be a string.',

        'course_fee.required' => 'The course fee is required.',
        'course_fee.numeric' => 'The course fee must be a number.',
        'course_fee.min' => 'The course fee must be at least 0.',

        'status.required' => 'The status is required.',
        'status.integer' => 'The status must be an integer.',
        'status.in' => 'The status must be either Active (1) or Inactive (0).',

        'is_show_in_home.required' => 'The show in home field is required.',
        'is_show_in_home.integer' => 'The show in home field must be an integer.',
        'is_show_in_home.in' => 'The show in home field must be either Yes (1) or No (0).',

        'picture.required' => 'The course image is required.',
        'picture.image' => 'The file must be an image.',
        'picture.mimes' => 'Allowed image types are: jpeg, jpg, png, gif, webp.',
        'picture.max' => 'The maximum allowed image size is 2MB.',
    ];
}

}