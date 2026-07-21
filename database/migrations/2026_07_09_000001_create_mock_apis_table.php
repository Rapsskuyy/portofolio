<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mock_apis', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // e.g. 'projects', 'stats', 'ping'
            $table->enum('method', ['GET', 'POST'])->default('GET');
            $table->json('response_body'); // JSON response
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mock_apis');
    }
};
