<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regestration extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'name_bn',
        'email',
        'phone',
        'dob',
        'nid_number',
        'father_name',
        'father_name_bn',
        'mother_name',
        'mother_name_bn',
        'present_address',
        'permanent_address',
        'gender',
        'education',
        'religion',
        'height',
        'weight',
        'photo',
        'signature',
    ];

    public function scopeFilter($query, $filters)
    {
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
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
}
