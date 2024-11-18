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
}
