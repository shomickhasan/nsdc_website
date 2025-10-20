<?php

namespace App\Imports;

use App\Models\District;
use App\Models\ProductType;
use App\Models\Uddokta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UddoktaImport implements ToModel,WithHeadingRow,WithValidation
{

    use Importable;

    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
       

        if (empty(array_filter($row))) {
            return null;
        }
      Log::info($row);
      $districtName = trim($row['entrepreneur_district']); // Remove leading and trailing spaces

      $district = District::where('name', 'like', "%{$districtName}%")
                      ->orWhere('bn_name', 'like', "%{$districtName}%")
                      ->first();
                      
        $producttype = ProductType::where('name', 'like', "%{$row['product_type']}%")->first();

        $districtId =  $district->id ;
        $divisonID =  $district->division_id;
        $productTypeID = $producttype->id ;

       /* $existingUddokta = Uddokta::where('registration_number', $row['entrepreneur_registration_number'])->first();

        if ($existingUddokta) {
            // Update phone and email if the record exists
            $existingUddokta->update([
                'phone' => $row['phone_number'] ?? $existingUddokta->phone,
                'email' => $row['email'] ?? $existingUddokta->email,
            ]);

            return null; // No new record is created
        }*/


        return new Uddokta([
            'entrepreneur_type' => $row['entrepreneur_type'],
            'registration_number' => $row['entrepreneur_registration_number'],
            'full_name' => $row['entrepreneur_name'] ?? null,
            'mother_name' => $row['mother_name'] ?? null,
            'father_name' => $row['father_name'] ?? null,
            'husband_name' => $row['husband_name'] ?? null,
            'division_id' => $divisonID,
            'district_id' => $districtId,
            'present_address' => $row['present_address'] ?? null,
            'permanent_address' => $row['permanent_address'] ?? null,
            'birth_date' => $row['birth_date'] ?? null,
            'phone' => $row['phone_number'] ?? null,
            'nid' => $row['national_id_card_number'] ?? null,
            'email' => $row['email'] ?? null,
            'secretary_name' => $row['secretary_name'] ?? null,
            'secretary_phone' => $row['secretary_phone'] ?? null,
            'secretary_email' => $row['secretary_email'] ?? null,
            'secretary_nid' => $row['secretary_national_id_card_number'] ?? null,
            'secretary_address' => $row['secretary_address'] ?? null,
            'association_name' => $row['association_name'] ?? null,
            'association_address' => $row['association_address'] ?? null,
            'organization_name' => $row['name_of_organization_managed'] ?? null,
            'organization_address' => $row['organization_address'] ?? null,
            'organization_email_address' => $row['organization_email_address'] ?? null,
            'product_type_id' => $productTypeID,
            'product_description' => $row['product_description'] ?? null,
            'online_shop_name' => $row['online_shop_name'] ?? null,
            'online_shop_url' => $row['online_shop_url'] ?? null,
            'tin_bin_number' => $row['tin_bin_number_if_have'] ?? null,
            'vat_register_number' => $row['vat_register_number_if_have'] ?? null,
            'entrepreneur_image' => 'dummy/user/uddokta.png',
        ]);
    }

    public function rules(): array
    {
        return [
             'entrepreneur_name' => 'required|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'entrepreneur_name.required' => 'The full name field is required.',
            'entrepreneur_name.max' => 'The full name field may not be greater than 255 characters.',
        ];
    }
}
