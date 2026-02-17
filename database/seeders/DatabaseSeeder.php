<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ChaptersSeeder::class);
        \App\Models\Article::factory(30)->create();
        $this->call(ContentSeeder::class);
        $this->call(ContactsSeeder::class);
    }
}
