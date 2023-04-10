<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(5)->create();
         Company::factory(20)->create();
         Employee::factory(100)->create();

         \App\Models\User::factory()->create([
             'name' => 'mostafa',
             'email' => 'admin@admin.com',
             'password' => Hash::make('password'),
         ]);

    }
}
