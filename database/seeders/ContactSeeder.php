<?php

namespace Database\Seeders;

use App\Enums\ContactStatus;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()
            ->sequence(
                ['status' => ContactStatus::New],
                ['status' => ContactStatus::Answered],
            )
            ->createMany(10);
    }
}
