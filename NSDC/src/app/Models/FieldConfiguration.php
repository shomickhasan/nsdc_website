<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldConfiguration extends Model
{
    use HasFactory;
    protected $table = 'field_configurations';

    protected $fillable = ['name', 'lable_name'];
}
