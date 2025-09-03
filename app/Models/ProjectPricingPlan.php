<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectPricingPlan extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'subtitle',
        'price',
        'features',
        'is_popular',
        'order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'is_popular' => 'boolean',
        'order' => 'integer'
    ];

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
}
