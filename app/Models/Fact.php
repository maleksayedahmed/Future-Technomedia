<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fact_section_id',
        'number',
        'label',
        'order',
        'is_active',
    ];

    protected $casts = [
        'number' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the section this fact belongs to
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(FactSection::class, 'fact_section_id');
    }

    /**
     * Scope to get only active facts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order facts by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get active facts ordered by order field
     */
    public static function getActiveFacts()
    {
        return static::active()->ordered()->get();
    }
}
