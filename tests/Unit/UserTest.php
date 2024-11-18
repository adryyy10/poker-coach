<?php

namespace Tests\Unit;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends BaseTestClass
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
    }

    public function testGetCollection(): void
    {
        $response = $this->getRequest('/api/users');
        $response->assertOk();
        $response->assertJsonCount(2, 'member');

        $responseContent = $response->getContent();
        $firstUser = json_decode($responseContent)?->member[0];

        $this->assertEquals('adri', $firstUser?->name);
        $this->assertTrue((bool)$firstUser?->isCoach);
        $this->assertEquals(['cash games', 'MTTs'], $firstUser?->specialty);
        $this->assertEquals(['mid', 'high'], $firstUser?->stakes);
        $this->assertEquals(150.00, $firstUser?->pricePerHour);
    }

    public function testFiltersCoaches(): void
    {
        $response = $this->getRequest('/api/users?is_coach=true');
        $response->assertOk();
        $response->assertJsonCount(1, 'member');
        $this->assertEquals('adri', $response->json('member.0.name'));
        $this->assertTrue($response->json('member.0.isCoach'));
    }
    
    public function testFiltersNonCoaches(): void
    {
        $response = $this->getRequest('/api/users?is_coach=false');
        $response->assertOk();
        $response->assertJsonCount(1, 'member');
        $this->assertEquals('John', $response->json('member.0.name'));
        $this->assertFalse($response->json('member.0.isCoach'));
    }
}