<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogsPageContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_subtitle',
        'hero_background_image',
        'hero_scroll_text',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope for active content
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get the first active content or create default
    public static function getContent()
    {
        $content = static::active()->first();

        if (!$content) {
            $content = static::create([
                'hero_title' => 'My Last news and Updates',
                'hero_description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
                'hero_subtitle' => 'Journal',
                'hero_scroll_text' => 'Let\'s Start',
                'is_active' => true
            ]);
        }

        return $content;
    }
}
