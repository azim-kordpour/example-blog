<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

test('Post has the trait of HasFactory')
    ->expect(fn () => class_uses(Post::class))
    ->toContain(HasFactory::class);

test('Post has the trait of sluggable')
    ->expect(fn () => class_uses(Post::class))
    ->toContain(Sluggable::class);

test('Post\'s model fillable is set.')
    ->expect(fn () => Post::make()->getFillable())
    ->toBeArray()
    ->toEqualCanonicalizing([
        'writer_id',
        'title',
        'description',
        'introduction',
        'body',
        'status',
        'slug',
        'published_at',
    ]);

test('Post\'s model cast is set')
    ->expect(fn () => Post::make()->getCasts())
    ->toBeArray()
    ->toMatchArray([
        'published_at' => 'datetime',
        'status' => PostStatus::class,
    ]);

test('Post has the config of sluggable')
    ->expect(fn () => Post::make()->sluggable())
    ->toBeArray()
    ->toBe([
        'slug' => [
            'source' => 'title',
        ],
    ]);

test('Post has a BelongsTo relation with User.')
    ->expect(fn () => Post::make()->writer())
    ->toBeInstanceOf(BelongsTo::class)
    ->and(fn () => Post::make()->writer()->getModel())
    ->toBeInstanceOf(User::class)
    ->and(fn () => Post::factory()->createOne()->writer)
    ->toBeInstanceOf(User::class);

test('Post has a BelongsToMany relation with Category.')
    ->expect(fn () => Post::make()->categories())
    ->toBeInstanceOf(BelongsToMany::class)
    ->and(fn () => Post::make()->categories()->getModel())
    ->toBeInstanceOf(Category::class)
    ->and(fn () => Post::factory()->hasCategories()->createOne()->categories->first())
    ->toBeInstanceOf(Category::class);

test('Post has a scope to get published posts.', function () {
    Post::factory()->published()->createOne();
    Post::factory()->create();

    expect(Post::published()->count())->toBeOne();
});

test('isPublished works.')
    ->expect(fn () => Post::factory()->createOne()->refresh()->isPublished())
    ->toBeFalse()
    ->and(fn () => Post::factory()->published()->createOne()->refresh()->isPublished())
    ->toBeTrue();
