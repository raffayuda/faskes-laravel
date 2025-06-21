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
        // Add timestamps to provinsi table
        Schema::table('provinsi', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        // Add timestamps to kabkota table
        Schema::table('kabkota', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        // Add timestamps to jenis_faskes table
        Schema::table('jenis_faskes', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        // Add timestamps to kategori table
        Schema::table('kategori', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove timestamps from provinsi table
        Schema::table('provinsi', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        // Remove timestamps from kabkota table
        Schema::table('kabkota', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        // Remove timestamps from jenis_faskes table
        Schema::table('jenis_faskes', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        // Remove timestamps from kategori table
        Schema::table('kategori', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
};
