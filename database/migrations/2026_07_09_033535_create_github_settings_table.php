<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('github_settings', function (Blueprint $table) {
            $table->id();
            $table->string('github_username')->nullable();
            $table->text('github_token')->nullable();
            $table->boolean('show_stats')->default(true);
            $table->boolean('show_repos')->default(true);
            $table->integer('cache_duration')->default(60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('github_settings');
    }
};
