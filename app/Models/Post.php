<?php

namespace App\Models;

use App\Enums\PostStatus;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'writer_id',
        'title',
        'description',
        'introduction',
        'body',
        'status',
        'slug',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
        'status' => PostStatus::class,
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array<string, array<string, string>>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * Get the writer that writes the post.
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the categories that belong to the post.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished(Builder $query): void
    {
        $query
            ->where('status', PostStatus::Published)
            ->whereDate('published_at', '<=', now());
    }

    /**
     * Check if the post has been published.
     */
    public function isPublished(): bool
    {
        return $this->status->isPublished() && $this->published_at?->lessThan(now());
    }
}
