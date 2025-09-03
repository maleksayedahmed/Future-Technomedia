<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTechStack extends Model
{
    protected $fillable = [
        'project_id',
        'parent_category',
        'technology',
        'icon',
        'order'
    ];

    protected $casts = [
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

    public function scopeByCategory($query, $category)
    {
        return $query->where('parent_category', $category);
    }
}
