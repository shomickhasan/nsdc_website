<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'group',
        'activity_type',
        'message',
        'url',
        'user_id',
    ];

    public function creator() {
        return $this->belongsTo(User::class,'user_id');
    }
}
