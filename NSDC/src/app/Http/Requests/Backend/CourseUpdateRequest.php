<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            'long_des' => 'nullable|string',
            'course_fee' => 'required|numeric|min:0',
            'status' => 'required|integer|in:0,1',
            'is_show_in_home' => 'required|integer|in:0,1',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Course title is required.',
            'title.string' => 'Course title must be a valid string.',
            'duration.string' => 'Duration must be a valid text.',
            'course_fee.numeric' => 'Course fee must be a valid number.',
            'course_fee.min' => 'Course fee cannot be negative.',
            'status.required' => 'Please select the course status.',
            'status.in' => 'Invalid status value selected.',
            'is_show_in_home.required' => 'Please specify if it should show on the home page.',
            'is_show_in_home.in' => 'Invalid home page display option.',
            'picture.image' => 'The uploaded file must be an image.',
            'picture.mimes' => 'Only jpeg, jpg, png, gif, or webp images are allowed.',
            'picture.max' => 'Image size must not exceed 2MB.',
        ];
    }
}
