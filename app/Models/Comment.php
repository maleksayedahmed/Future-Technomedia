<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'content',
        'status',
        'blog_id',
        'parent_id'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    // Relationships
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Scopes
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    // Accessors
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y \a\t H:i');
    }

    public function getGravatarAttribute()
    {
        $email = md5(strtolower(trim($this->email)));
        return "https://www.gravatar.com/avatar/{$email}?d=identicon&s=50";
    }
}
