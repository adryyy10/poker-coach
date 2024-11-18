<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class BaseTestClass extends TestCase
{
    protected function getRequest(string $uri): TestResponse
    {
        return $this->withHeaders([
            'Accept' => 'application/ld+json',
        ])->get($uri);
    }

    protected function createRegularUsers(): void
    {
        User::factory()->create([
            'name' => 'John',
        ]);
    }

    protected function createCoaches(): void
    {
        User::factory()->create([
            'name' => 'adri',
            'bio' => 'High stakes coach with over 5 years of experience in NL1000',
            'is_coach' => true,
            'specialty' => ['cash games', 'MTTs'],
            'stakes' => ['mid', 'high'],
            'price_per_hour' => 150.00,
        ]);
    }
}
