<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Team::factory(2)->create();
        User::factory(6)->create();
    //     $this->call(TeamSeeder::class);
    //     $this->call(UserSeeder::class);
    }
}
