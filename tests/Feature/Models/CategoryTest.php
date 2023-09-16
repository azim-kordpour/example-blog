<?php

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

test('Category has the trait of HasFactory')
    ->expect(fn () => class_uses(Category::class))
    ->toContain(HasFactory::class);

test('Category has the trait of sluggable')
    ->expect(fn () => class_uses(Category::class))
    ->toContain(Sluggable::class);

test('category\'s model fillable is set.')
    ->expect(fn () => Category::make()->getFillable())
    ->toBeArray()
    ->toEqualCanonicalizing([
        'name',
        'slug',
    ]);

test('Category has the config of sluggable')
    ->expect(fn () => Category::make()->sluggable())
    ->toBeArray()
    ->toBe([
        'slug' => [
            'source' => 'name',
        ],
    ]);

test('Category has a BelongsToMany relation with Post.')
    ->expect(fn () => Category::make()->posts()->getModel())
    ->toBeInstanceOf(Post::class)
    ->and(fn () => Category::factory()->hasPosts()->createOne()->posts->first())
    ->toBeInstanceOf(Post::class);
