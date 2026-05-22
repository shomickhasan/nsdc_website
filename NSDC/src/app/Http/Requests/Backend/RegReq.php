<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class RegReq extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'batch_id' => 'nullable|exists:batch_models,id',
            'admission_status' => 'nullable|in:pending,admitted',
            'admitted_at' => 'nullable|date',

            'full_name_en' => 'required|string|max:255',
            'full_name_bn' => 'required|string|max:255',
            'nid' => 'required|string|max:50',

            'date_of_birth' => 'required|date',
            'sex' => 'required|in:Male,Female,Other',
            'pwd' => 'nullable|in:Yes,No',
            'religion' => 'required|string|max:100',
            'blood_group' => 'required',
            'marital_status' => 'nullable|in:Married,Unmarried',
            'identity_no' => 'nullable|string|max:100',

            'father_name_en' => 'required|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'mother_name_en' => 'required|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',

            // Permanent
            'permanent_division_id' => 'required|exists:divisions,id',
            'permanent_district_id' => 'required|exists:districts,id',
            'permanent_upazila_id' => 'required|exists:upazilas,id',
            'permanent_post_office' => 'required|string|max:255',
            'permanent_area_type' => 'nullable|in:Rural,Urban',
            'permanent_address' => 'required|string|max:500',

            // Present
            'same_as_permanent' => 'nullable|boolean',
            'present_division_id' => 'required|exists:divisions,id',
            'present_district_id' => 'required|exists:districts,id',
            'present_upazila_id' => 'required|exists:upazilas,id',
            'present_post_office' => 'required|string|max:255',
            'present_address' => 'required|string|max:500',

            // Education
            'board_university' => 'nullable|string|max:255',
            'highest_education_level' => 'nullable|string|max:255',
            'highest_education_institute_name' => 'nullable|string|max:255',
            'highest_education_passing_year' => 'nullable|string|max:20',
            'tvet_certificate' => 'nullable|in:Yes,No',
            'ethnic_minority' => 'nullable|in:Yes,No',

            // Skill / Experience / Income
            'company_name' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'past_skill_training' => 'nullable|string|max:255',
            'employment_status_before_training' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric|min:0',

            // Files
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',

            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'emergency_contact_no' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [

            'full_name_en.required' => 'Full name (English) is required.',
            'full_name_bn.required' => 'Full name (Bangla) is required.',
            'nid.required' => 'NID is required.',

            'date_of_birth.required' => 'Date of birth is required.',
            'sex.required' => 'Please select your gender.',
            'religion.required' => 'Religion is required.',
            'blood_group.required' => 'Blood group is required.',

            'father_name_en.required' => 'Father name is required.',
            'mother_name_en.required' => 'Mother name is required.',

            // Permanent
            'permanent_division_id.required' => 'Permanent division is required.',
            'permanent_district_id.required' => 'Permanent district is required.',
            'permanent_upazila_id.required' => 'Permanent upazila is required.',
            'permanent_post_office.required' => 'Permanent post office is required.',
            'permanent_address.required' => 'Permanent address is required.',

            // Present
            'present_division_id.required' => 'Present division is required.',
            'present_district_id.required' => 'Present district is required.',
            'present_upazila_id.required' => 'Present upazila is required.',
            'present_post_office.required' => 'Present post office is required.',
            'present_address.required' => 'Present address is required.',

            // Files
            'photo.image' => 'Photo must be an image.',
            'photo.mimes' => 'Photo must be JPG, JPEG or PNG.',
            'photo.max' => 'Photo must be less than 2MB.',

            'signature.image' => 'Signature must be an image.',
            'signature.mimes' => 'Signature must be JPG, JPEG or PNG.',
            'signature.max' => 'Signature must be less than 1MB.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Contact number is required.',
            'emergency_contact_no.required' => 'Emergency contact number is required.',
        ];
    }
}
