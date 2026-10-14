<?php

namespace Tests\Feature;

use Tests\TestCase;

class SupabaseImportCommandTest extends TestCase
{
    public function test_import_requires_explicit_confirmation(): void
    {
        $this->artisan('portfolio:import-supabase')
            ->expectsOutput('Import stopped. Re-run with --force after confirming the target Supabase database.')
            ->assertExitCode(1);
    }
}
