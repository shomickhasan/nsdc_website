<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UddoktaRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|min:2',
            'entrepreneur_type' => 'required',
            'product_type_id' => 'required',
            'entrepreneur_image' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:jpg,jpeg,png|max:2048' :
                        'nullable|mimes:jpg,jpeg,png|max:2048',
            'association_registration_certificate' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
            'association_trade_license' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
            'constitution_association' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
            'council_members_association' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
            'president_photo' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:jpg,jpeg,png|max:512' :
                        'nullable|mimes:jpg,jpeg,png|max:512',
            'association_image' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:jpg,jpeg,png|max:512' :
                        'nullable|mimes:jpg,jpeg,png|max:512',
            'president_nid' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
            'association_nid' => $this->getMethod() == 'POST' ?
                        'nullable|mimes:pdf|max:1024' :
                        'nullable|mimes:pdf|max:1024',
        ];
    }


    public function messages()
    {
        return [
            'full_name.required' => 'The full name field is required.',
            'full_name.min' => 'The full name field must be at least 2 characters.',
            'entrepreneur_image.mimes' => 'The entrepreneur image must be a file of type: jpg, jpeg, png.',
            'entrepreneur_image.max' => 'The entrepreneur image may not be greater than 512 KB.',
            'association_registration_certificate.mimes' => 'The association registration certificate must be a file of type: pdf.',
            'association_registration_certificate.max' => 'The association registration certificate may not be greater than 1 MB.',
            'association_trade_license.mimes' => 'The association trade license must be a file of type: pdf.',
            'association_trade_license.max' => 'The association trade license may not be greater than 1 MB.',
            'constitution_association.mimes' => 'The constitution of the association must be a file of type: pdf.',
            'constitution_association.max' => 'The constitution of the association may not be greater than 1 MB.',
            'council_members_association.mimes' => 'The council members document must be a file of type: pdf.',
            'council_members_association.max' => 'The council members document may not be greater than 1 MB.',
            'president_photo.mimes' => 'The president photo must be a file of type: jpg, jpeg, png.',
            'president_photo.max' => 'The president photo may not be greater than 512 KB.',
            'association_image.mimes' => 'The association image must be a file of type: jpg, jpeg, png.',
            'association_image.max' => 'The association image may not be greater than 512 KB.',
            'president_nid.mimes' => 'The president NID must be a file of type: pdf.',
            'president_nid.max' => 'The president NID may not be greater than 1 MB.',
            'association_nid.mimes' => 'The association NID must be a file of type: pdf.',
            'association_nid.max' => 'The association NID may not be greater than 1 MB.',
            'entrepreneur_type.required' => 'The entrepreneur type field is required.',
            'product_type_id.required' => 'The product type field is required.',
        ];
    }
}
