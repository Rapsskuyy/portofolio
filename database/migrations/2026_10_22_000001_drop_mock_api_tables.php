<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Remove the retired Mock API feature tables after their data has been
     * exported with portfolio:export-data.
     */
    public function up(): void
    {
        Schema::dropIfExists('mock_apis');
        Schema::dropIfExists('api_endpoints');
    }

    /**
     * The retired endpoint records are intentionally not recreated on rollback.
     * Recover them from the pre-migration portfolio export if needed.
     */
    public function down(): void
    {
        // Historical create migrations define the original schema.
    }
};
