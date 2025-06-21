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
        Schema::create('faskes_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('faskes_id')->constrained()->onDelete('cascade');
            $table->integer('rating')->unsigned()->check('rating >= 1 AND rating <= 5');
            $table->text('review')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
            
            // Ensure user can only review a faskes once
            $table->unique(['user_id', 'faskes_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faskes_reviews');
    }
};
