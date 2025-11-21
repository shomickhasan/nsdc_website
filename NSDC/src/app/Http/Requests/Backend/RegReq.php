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
            'name' => 'required|string|max:255',
            'name_bn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:11',
            'dob' => 'required|date',
            'nid_number' => 'required|string|min:1 | max:10',
            'father_name' => 'required|string|max:255',
            'father_name_bn' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_name_bn' => 'required|string|max:255',
            'present_address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'gender' => 'required|in:Male,Female,Other',
            'education' => 'required|in:SSC,HSC,Honours,Degree (Pass),Masters',
            'religion' => 'required|string|max:100',
            'height' => 'required|string|max:10',
            'weight' => 'required|string|max:10',
            'photo' => 'required|image|mimes:jpeg,jpg,png|dimensions:min_width=300,min_height=300|max:2048',
            'signature' => 'required|image|mimes:jpeg,jpg,png|dimensions:min_width=300,min_height=80|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Full name is required.',
            'name_bn.required' => 'Full name (Bangla) is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'dob.required' => 'Date of birth is required.',
            'nid_number.required' => 'NID number is required.',
            'father_name.required' => 'Father\'s name is required.',
            'father_name_bn.required' => 'Father\'s name (Bangla) is required.',
            'mother_name.required' => 'Mother\'s name is required.',
            'mother_name_bn.required' => 'Mother\'s name (Bangla) is required.',
            'present_address.required' => 'Present address is required.',
            'permanent_address.required' => 'Permanent address is required.',
            'gender.required' => 'Please select your gender.',
            'education.required' => 'Please select your highest educational qualification.',
            'religion.required' => 'Religion is required.',
            'height.required' => 'Height is required.',
            'weight.required' => 'Weight is required.',
            'photo.required' => 'Please upload your photo.',
            'photo.image' => 'Photo must be an image file.',
            'photo.mimes' => 'Photo must be a JPEG, JPG, or PNG file.',
            'photo.dimensions' => 'Photo must be at least 300x300 pixels.',
            'signature.required' => 'Please upload your signature.',
            'signature.image' => 'Signature must be an image file.',
            'signature.mimes' => 'Signature must be a JPEG, JPG, or PNG file.',
            'signature.dimensions' => 'Signature must be at least 300x80 pixels.',
        ];
    }
}
