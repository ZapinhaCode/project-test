<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function TestRouteLogin(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function TestRouteProdutos(): void {
        $response = $this->get('/produtos');
        $response->assertStatus(200);
    }
}