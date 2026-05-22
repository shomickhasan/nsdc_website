<?php

namespace App\Exports;

use App\Models\Backend\Regestration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function __construct(protected array $filters = [])
    {
    }

    public function collection()
    {
        return Regestration::with([
            'course',
            'permanentDivision',
            'permanentDistrict',
            'permanentUpazila',
            'presentDivision',
            'presentDistrict',
            'presentUpazila',
        ])
            ->filter($this->filters)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Registration Date',
            'Course',
            'Admission Status',
            'Batch',
            'Admitted At',
            'Full Name (English)',
            'Full Name (Bangla)',
            'Email',
            'Phone',
            'Emergency Contact No',
            'NID',
            'Father Name',
            'Mother Name',
            'Sex',
            'Date of Birth',
            'Religion',
            'Blood Group',
            'Marital Status',
            'PWD',
            'Permanent Division',
            'Permanent District',
            'Permanent Upazila',
            'Permanent Post Office',
            'Permanent Address',
            'Present Division',
            'Present District',
            'Present Upazila',
            'Present Post Office',
            'Present Address',
            'Board/University',
            'Highest Education Level',
            'Institute Name',
            'Passing Year',
            'TVET Certificate',
            'Ethnic Minority',
            'Company Name',
            'Designation',
            'Past Skill Training',
            'Employment Status Before Training',
            'Monthly Income',
        ];
    }

    public function map($reg): array
    {
        return [
            $reg->id,
            optional($reg->created_at)->format('d M Y h:i A'),
            $reg->course->title ?? '',
            $reg->admission_status ?? 'pending',
            $reg->batch->batch_name ?? '',
            optional($reg->admitted_at)->format('d M Y h:i A'),
            $reg->full_name_en,
            $reg->full_name_bn,
            $reg->email,
            $reg->phone,
            $reg->emergency_contact_no,
            $reg->nid,
            $reg->father_name_en,
            $reg->mother_name_en,
            $reg->sex,
            $reg->date_of_birth,
            $reg->religion,
            $reg->blood_group,
            $reg->marital_status,
            $reg->pwd,
            $reg->permanentDivision->name ?? '',
            $reg->permanentDistrict->name ?? '',
            $reg->permanentUpazila->name ?? '',
            $reg->permanent_post_office,
            $reg->permanent_address,
            $reg->presentDivision->name ?? '',
            $reg->presentDistrict->name ?? '',
            $reg->presentUpazila->name ?? '',
            $reg->present_post_office,
            $reg->present_address,
            $reg->board_university,
            $reg->highest_education_level,
            $reg->highest_education_institute_name,
            $reg->highest_education_passing_year,
            $reg->tvet_certificate,
            $reg->ethnic_minority,
            $reg->company_name,
            $reg->designation,
            $reg->past_skill_training,
            $reg->employment_status_before_training,
            $reg->monthly_income,
        ];
    }
}
