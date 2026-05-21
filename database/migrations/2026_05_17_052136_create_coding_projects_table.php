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
        Schema::create('coding_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();
            $table->json('technologies')->nullable();
            $table->string('category')->default('web'); // web, mobile, desktop, etc
            $table->year('year')->nullable(); // Tahun pembuatan (kelas 10, 11, etc)
            $table->integer('order')->default(0); // Urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coding_projects');
    }
};
