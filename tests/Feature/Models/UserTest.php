<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

test('User has the trait of HasFactory')
    ->expect(fn () => class_uses(User::class))
    ->toContain(HasFactory::class);

test('User has the trait of sluggable')
    ->expect(fn () => class_uses(User::class))
    ->toContain(Notifiable::class);

test('User\'s model fillable is set.')
    ->expect(fn () => User::make()->getFillable())
    ->toBeArray()
    ->toEqualCanonicalizing([
        'name',
        'email',
        'password',
    ]);

test('User\'s model hidden is set.')
    ->expect(fn () => User::make()->getHidden())
    ->toBeArray()
    ->toEqualCanonicalizing([
        'password',
        'remember_token',
    ]);

test('User\'s model cast is set.')
    ->expect(fn () => User::make()->getCasts())
    ->toBeArray()
    ->toMatchArray([
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ]);

test('User has a HasMany relation with Post.')
    ->expect(fn () => User::make()->posts())
    ->toBeInstanceOf(HasMany::class)
    ->and(fn () => User::factory()->hasPosts()->createOne()->posts->first())
    ->toBeInstanceOf(Post::class);
