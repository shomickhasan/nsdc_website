<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class BatchModel extends Model
{
    use HasFactory;

    protected $casts = [
        'open_at' => 'datetime',
        'complete_at' => 'datetime',
        'status' => 'integer',
    ];

    public const STATUS_INACTIVE = 0;
    public const STATUS_OPEN = 1;
    public const STATUS_FULL = 2;
    public const STATUS_COMPLETE = 3;

    public static function statusList(): array
    {
        return [
            self::STATUS_INACTIVE => 'Inactive',
            self::STATUS_OPEN => 'Open',
            self::STATUS_FULL => 'Full',
            self::STATUS_COMPLETE => 'Batch Complete',
        ];
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected $fillable = [
        'course_id',
        'batch_name',
        'batch_code',
        'slug',
        'status',
        'open_at',
        'complete_at',
    ];


}
