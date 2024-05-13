<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ipv4;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Ipv4::factory()->count(5)->create();
    }
}
