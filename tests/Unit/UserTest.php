<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends BaseTestClass
{
    use RefreshDatabase;

    public function testGetCollection(): void
    {
        $this->createCoaches();
        $this->createRegularUsers();

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
}