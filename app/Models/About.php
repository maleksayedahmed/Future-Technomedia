<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class About extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'services_title',
        'services_subtitle',
        'services',
        'video_title',
        'video_description',
        'video_button_text',
        'cta_title',
        'cta_button_text',
        'cta_button_url',
        'is_active',
        'order'
    ];

    protected $casts = [
        'services' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->performOnCollections('hero_background', 'video_thumbnail');

        $this->addMediaConversion('medium')
            ->width(600)
            ->height(600)
            ->sharpen(10)
            ->performOnCollections('hero_background', 'video_thumbnail', 'service_images');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_background')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('video_thumbnail')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('presentation_video')
            ->singleFile()
            ->acceptsMimeTypes(['video/mp4', 'video/avi', 'video/mov', 'video/wmv']);

        $this->addMediaCollection('service_images')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('presentation_pdf')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf']);
    }

    public function getHeroBackgroundUrlAttribute()
    {
        return $this->getFirstMediaUrl('hero_background');
    }

    public function getVideoThumbnailUrlAttribute()
    {
        return $this->getFirstMediaUrl('video_thumbnail');
    }

    public function getPresentationVideoUrlAttribute()
    {
        return $this->getFirstMediaUrl('presentation_video');
    }

    public function getPresentationPdfUrlAttribute()
    {
        return $this->getFirstMediaUrl('presentation_pdf');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
