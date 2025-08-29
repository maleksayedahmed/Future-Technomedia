<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        if ($setting->type === 'image' && $setting->hasMedia('images')) {
            return $setting->getFirstMediaUrl('images');
        }

        if ($setting->type === 'boolean') {
            return (bool) $setting->value;
        }

        return $setting->value ?: $default;
    }

    /**
     * Set setting value by key
     */
    public static function set($key, $value, $type = 'text', $group = 'general', $label = null, $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'label' => $label ?: str_replace('_', ' ', ucfirst($key)),
                'description' => $description,
            ]
        );
    }

    /**
     * Get settings by group
     */
    public static function getByGroup($group)
    {
        return static::where('group', $group)
            ->orderBy('order')
            ->orderBy('key')
            ->get()
            ->pluck('value', 'key');
    }

    /**
     * Get all settings as key-value pairs
     */
    public static function getAllSettings()
    {
        $settings = static::all();
        $result = [];

        foreach ($settings as $setting) {
            if ($setting->type === 'image' && $setting->hasMedia('images')) {
                $result[$setting->key] = $setting->getFirstMediaUrl('images');
            } elseif ($setting->type === 'boolean') {
                $result[$setting->key] = (bool) $setting->value;
            } else {
                $result[$setting->key] = $setting->value;
            }
        }

        return $result;
    }

    /**
     * Media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif']);
    }
}
