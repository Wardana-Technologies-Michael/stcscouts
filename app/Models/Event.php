<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'body',
        'banner_path',
        'event_date',
        'end_date',
        'location',
        'published',
        'sort_order',
    ];

    protected $casts = [
        'event_date'  => 'date',
        'end_date'    => 'date',
        'published'   => 'boolean',
        'sort_order'  => 'integer',
    ];

    public function getBannerUrlAttribute(): ?string
    {
        return $this->banner_path ? asset($this->banner_path) : null;
    }
}
