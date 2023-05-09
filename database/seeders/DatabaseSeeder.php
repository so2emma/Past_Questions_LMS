<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\College;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'name' => "Admin",
            'email' => "user@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        College::create([
            'name' => "College of Science and Technology",
            'abbr' => "CST",
            'description' => fake()->text(),
        ]);

        College::create([
            'name' => "College of Engineering",
            'abbr' => "COE",
            'description' => fake()->text(),
        ]);

        College::create([
            'name' => "College of Ledership Development Studies",
            'abbr' => "CLDS",
            'description' => fake()->text(),
        ]);

        College::create([
            'name' => "College of Management and Social Sciences",
            'abbr' => "CMSS",
            'description' => fake()->text(),
        ]);

        Department::create([
            'college_id' => College::first()->id,
            'name' => "Computer and Information Science",
            'abbr' => "CIS",
            'description' => fake()->text(),
        ]);

        Department::create([
            'college_id' => College::first()->id,
            'name' => "Indestrial Mathemathics",
            'abbr' => "IM",
            'description' => fake()->text(),
        ]);


    }
}
