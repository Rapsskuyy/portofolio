<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RetiredMockApiFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_mock_api_tables_and_routes_are_removed(): void
    {
        $this->assertFalse(Schema::hasTable('mock_apis'));
        $this->assertFalse(Schema::hasTable('api_endpoints'));

        $this->get('/api/v1/ping')->assertNotFound();
        $this->get('/v1/ping')->assertNotFound();
        $this->get('/admin/mock-apis')->assertNotFound();
    }
}
