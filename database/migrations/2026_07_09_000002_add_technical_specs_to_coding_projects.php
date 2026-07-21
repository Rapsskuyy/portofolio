<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coding_projects', function (Blueprint $table) {
            $table->text('architecture_diagram')->nullable()->after('order');
            $table->text('database_schema')->nullable()->after('architecture_diagram');
            $table->text('code_snippet')->nullable()->after('database_schema');
        });
    }

    public function down(): void
    {
        Schema::table('coding_projects', function (Blueprint $table) {
            $table->dropColumn(['architecture_diagram', 'database_schema', 'code_snippet']);
        });
    }
};
