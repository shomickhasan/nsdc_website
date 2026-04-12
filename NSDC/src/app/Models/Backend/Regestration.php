<?php

namespace App\Models\Backend;

use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regestration extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'batch_id',
        'admission_status',
        'admitted_at',
        'email',
        'phone',
        'nid',
        'full_name_en',
        'full_name_bn',
        'father_name_en',
        'father_occupation',
        'mother_name_en',
        'mother_occupation',
        'sex',
        'date_of_birth',
        'pwd',
        'religion',
        'blood_group',
        'marital_status',
        'identity_no',
        'permanent_division_id',
        'permanent_district_id',
        'permanent_upazila_id',
        'permanent_post_office',
        'permanent_area_type',
        'permanent_address',
        'same_as_permanent',
        'present_division_id',
        'present_district_id',
        'present_upazila_id',
        'present_post_office',
        'present_address',
        'board_university',
        'highest_education_level',
        'highest_education_institute_name',
        'highest_education_passing_year',
        'tvet_certificate',
        'ethnic_minority',
        'company_name',
        'designation',
        'past_skill_training',
        'employment_status_before_training',
        'monthly_income',
        'photo',
        'signature',
    ];

    public function scopeFilter($query, $filters)
    {
        if (!empty($filters['name'])) {
            $query->where(function ($subQuery) use ($filters) {
                $subQuery->where('full_name_en', 'like', '%' . $filters['name'] . '%')
                    ->orWhere('full_name_bn', 'like', '%' . $filters['name'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['name'] . '%')
                    ->orWhere('phone', 'like', '%' . $filters['name'] . '%')
                    ->orWhere('nid', 'like', '%' . $filters['name'] . '%');
            });
        }

        if (!empty($filters['course_id'])) {
            $query->where('course_id', $filters['course_id']);
        }

        if (!empty($filters['batch_id'])) {
            $query->where('batch_id', $filters['batch_id']);
        }

        if (!empty($filters['admission_status'])) {
            $query->where('admission_status', $filters['admission_status']);
        }

        if (!empty($filters['from_date']) && !empty($filters['to_date'])) {
            $query->whereBetween('created_at', [$filters['from_date'], $filters['to_date']]);
        }

        return $query;
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo(BatchModel::class, 'batch_id');
    }



    public function permanentDivision()
    {
        return $this->belongsTo(Division::class, 'permanent_division_id');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district_id');
    }

    public function permanentUpazila()
    {
        return $this->belongsTo(Upazila::class, 'permanent_upazila_id');
    }

    public function presentDivision()
    {
        return $this->belongsTo(Division::class, 'present_division_id');
    }

    public function presentDistrict()
    {
        return $this->belongsTo(District::class, 'present_district_id');
    }

    public function presentUpazila()
    {
        return $this->belongsTo(Upazila::class, 'present_upazila_id');
    }
}
