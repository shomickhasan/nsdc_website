<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostOffice extends Model
{
    use HasFactory;
    protected $fillable = ['id','upazila_id','name','post_code'];

    public $timestamps = false;
}
