<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectPricingPlan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'project_id',
        'title',
        'subtitle',
        'price',
        'per_user_price',
        'pricing_type',
        'features',
        'is_popular',
        'order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'per_user_price' => 'decimal:2',
        'features' => 'array',
        'is_popular' => 'boolean',
        'order' => 'integer'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        // Only create thumbnail for non-SVG images
        if ($media && $media->mime_type !== 'image/svg+xml') {
            $this->addMediaConversion('thumb')
                ->width(64)
                ->height(64)
                ->sharpen(10);
        }
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    // Helper methods for pricing types
    public function hasFixedPrice()
    {
        return in_array($this->pricing_type, ['fixed', 'both']);
    }

    public function hasPerUserPrice()
    {
        return in_array($this->pricing_type, ['per_user', 'both']);
    }

    public function getCurrencyIcon()
    {
        $media = $this->getFirstMedia('currency_icon');
        if (!$media) {
            return null;
        }

        // For SVG files, return the original URL since conversions don't work
        if ($media->mime_type === 'image/svg+xml') {
            return $media->getUrl();
        }

        // For other images, try to get the thumbnail conversion
        return $media->hasGeneratedConversion('thumb') ? $media->getUrl('thumb') : $media->getUrl();
    }

    public function getDisplayPrice()
    {
        if ($this->pricing_type === 'both') {
            return [
                'fixed' => $this->price,
                'per_user' => $this->per_user_price
            ];
        } elseif ($this->pricing_type === 'per_user') {
            return $this->per_user_price;
        } else {
            return $this->price;
        }
    }
}
