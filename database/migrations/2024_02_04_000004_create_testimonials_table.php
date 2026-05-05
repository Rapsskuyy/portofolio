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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('position')->nullable(); // Posisi/Jabatan
            $table->text('message');
            $table->integer('rating')->default(5); // Rating 1-5
            $table->string('image_url')->nullable(); // Foto profil (optional)
            $table->boolean('is_approved')->default(false); // Approval system
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
