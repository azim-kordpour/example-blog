<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->resolve(UserSeeder::class)->run();

        $this->resolve(PostSeeder::class)->run();

        $this->resolve(ContactSeeder::class)->run();
    }
}
