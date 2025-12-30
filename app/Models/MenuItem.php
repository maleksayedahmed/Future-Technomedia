<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'route', 'url', 'order', 'is_active'];

    // Helper to get the actual URL
    public function getLinkAttribute()
    {
        if ($this->route) {
            // Check if route exists to prevent crashes
            return Route::has($this->route) ? route($this->route) : '#';
        }
        return $this->url ?? '#';
    }

    // Scope to only show active items sorted by order
    public function scopeDisplayable($query)
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }
}
