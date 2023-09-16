<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->published()->hasCategories(3)->createMany(10);

        Post::factory()->draft()->hasCategories(2)->createMany(3);

        Post::factory()->inPublishQueue()->hasCategories(2)->createMany(3);

        Post::factory()->archive()->hasCategories(2)->createMany(3);
    }
}
