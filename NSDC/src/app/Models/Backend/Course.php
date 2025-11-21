<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'duration',
        'short_des',
        'long_des',
        'course_fee',
        'status',
        'is_show_in_home',
        'picture',
        'code',
    ];
}
