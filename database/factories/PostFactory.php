<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'writer_id' => User::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
            'introduction' => fake()->paragraph(),
            'body' => fake()->paragraphs(5, true),
        ];
    }

    /**
     * Indicate that the model's status should be Published.
     */
    public function published(Carbon $publishedAt = null): self
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatus::Published,
            'published_at' => $publishedAt ?? now(),
        ]);
    }

    /**
     * Indicate that the model's status should be Draft.
     */
    public function draft(): self
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatus::Draft,
        ]);
    }

    /**
     * Indicate that the model's status should be Archive.
     */
    public function archive(): self
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatus::Archive,
        ]);
    }

    /**
     * Indicate that the model's status should be InPublishQueue.
     */
    public function inPublishQueue(int $days = 3): self
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatus::InPublishQueue,
            'published_at' => now()->addDays($days),
        ]);
    }
}
