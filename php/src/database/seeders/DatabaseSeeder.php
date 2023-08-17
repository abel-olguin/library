<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'admin@admin.com']);

        $this->call(CategorySeeder::class);
        $this->call(AuthorSeeder::class);

        $this->call(BookSeeder::class);
        $this->call(BookCategorySeeder::class);
        $this->call(AuthorBookSeeder::class);

        $this->call(LoanSeeder::class);
    }
}
