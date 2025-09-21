<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FactSection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the facts for this section
     */
    public function facts(): HasMany
    {
        return $this->hasMany(Fact::class)->ordered();
    }

    /**
     * Get active facts for this section
     */
    public function activeFacts(): HasMany
    {
        return $this->hasMany(Fact::class)->active()->ordered();
    }

    /**
     * Scope to get only active sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order sections
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get the first/default active section
     */
    public static function getActiveSection()
    {
        return static::active()->ordered()->first();
    }

    /**
     * Media collections for background images
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background_images')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }

    /**
     * Media conversions for background images
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(600)
            ->sharpen(10);
    }
}
