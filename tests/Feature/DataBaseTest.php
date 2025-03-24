<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DataBaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_database_connection()
    {
        $result = DB::select('SELECT 1');
        $this->assertNotEmpty($result);
    }
}
