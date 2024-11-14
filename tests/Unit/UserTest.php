<?php

namespace Tests\Unit;

class UserTest extends BaseTestClass
{
    public function testGetCollection(): void
    {
        $response = $this->getRequest('/api/users');
        $response->assertOk();
        $response->assertJsonCount(1, 'member');

        $responseContent = $response->getContent();
        $firstUser = json_decode($responseContent)?->member[0];
        $this->assertEquals('adri', $firstUser?->name);
    }
}