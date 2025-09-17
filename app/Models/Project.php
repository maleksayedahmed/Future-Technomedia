<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'pdf_file',
        'project_category',
        'live_url',
        'github_url',
        'pricing_type',
        'fixed_price',
        'discount_amount',
        'discount_type',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'fixed_price' => 'decimal:2',
        'discount_amount' => 'decimal:2'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->sharpen(10);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Relationships
    public function features()
    {
        return $this->hasMany(ProjectFeature::class)->ordered();
    }

    public function techStacks()
    {
        return $this->hasMany(ProjectTechStack::class)->ordered();
    }

    public function pricingPlans()
    {
        return $this->hasMany(ProjectPricingPlan::class)->ordered();
    }

    // Helper methods
    public function hasFixedPrice()
    {
        return $this->pricing_type === 'fixed';
    }

    public function hasPricingPlans()
    {
        return $this->pricing_type === 'plans';
    }

    public function hasNoPrice()
    {
        return $this->pricing_type === 'none';
    }

    public function getDiscountedPrice()
    {
        if (!$this->hasFixedPrice() || !$this->discount_amount) {
            return $this->fixed_price;
        }

        if ($this->discount_type === 'percentage') {
            return $this->fixed_price - ($this->fixed_price * $this->discount_amount / 100);
        }

        return $this->fixed_price - $this->discount_amount;
    }

    public function getTechStacksByCategory()
    {
        return $this->techStacks->groupBy('parent_category');
    }
}
