<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'chip_label',
        'year',
        'category',
        'icon',
        'banner_path',
        'body',
        'sort_order',
        'published',
    ];

    protected $casts = [
        'year'       => 'integer',
        'sort_order' => 'integer',
        'published'  => 'boolean',
    ];

    /**
     * The label shown on the timeline chip (falls back to the title).
     */
    public function getChipLabelTextAttribute(): string
    {
        return $this->chip_label ?: $this->title;
    }

    /**
     * Public URL for the banner image, or null when none is set.
     */
    public function getBannerUrlAttribute(): ?string
    {
        return $this->banner_path ? asset($this->banner_path) : null;
    }

    /**
     * Era band this report's year belongs to, e.g. "2010-2014".
     */
    public function getEraAttribute(): ?string
    {
        foreach (config('reports.eras') as $era) {
            if ($this->year >= $era['start'] && $this->year <= $era['end']) {
                return $era['key'];
            }
        }

        return null;
    }
}
