<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Admin, Category, Country, Tag, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(1)->create();
        User::factory(100)->create();
        // Country::factory(10)->create();
        // Category::factory(10)->create();
        // Tag::factory(10)->create();
    }
}
