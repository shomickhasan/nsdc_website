<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public const TYPE_PICTURE = 'picture';
    public const TYPE_VIDEO = 'video';

    protected $fillable = [
        'type',
        'title',
        'image',
        'youtube_url',
        'order',
        'status',
    ];

    public function getYoutubeIdAttribute(): ?string
    {
        if (!$this->youtube_url) {
            return null;
        }

        $patterns = [
            '/youtu\.be\/([A-Za-z0-9_-]{6,})/',
            '/youtube\.com\/watch\?v=([A-Za-z0-9_-]{6,})/',
            '/youtube\.com\/embed\/([A-Za-z0-9_-]{6,})/',
            '/youtube\.com\/shorts\/([A-Za-z0-9_-]{6,})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $this->youtube_url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        return $this->youtube_id ? 'https://www.youtube.com/embed/' . $this->youtube_id : null;
    }

    public function getYoutubeThumbnailUrlAttribute(): ?string
    {
        return $this->youtube_id ? 'https://img.youtube.com/vi/' . $this->youtube_id . '/hqdefault.jpg' : null;
    }
}
