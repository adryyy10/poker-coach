<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Coach
        User::factory()->create([
            'name' => 'adri',
            'bio' => 'High stakes coach with over 5 years of experience in NL1000',
            'is_coach' => true,
            'specialty' => ['cash games', 'MTTs'],
            'stakes' => ['mid', 'high'],
            'price_per_hour' => 150.00,
        ]);

        // Regular user
        User::factory()->create([
            'name' => 'John',
            'is_coach' => false,
        ]);
    }
}
