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
        // Tabel provinsi
        Schema::create('provinsi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('ibukota', 45)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
        });

        // Tabel kabkota
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsi')->onDelete('set null');
        });

        // Tabel jenis_faskes
        Schema::create('jenis_faskes', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
        });

        // Tabel kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
        });

        // Tabel faskes
        Schema::create('faskes', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nama_pengelola', 45)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('website', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->foreignId('kabkota_id')->nullable()->constrained('kabkota')->onDelete('set null');
            $table->integer('rating')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->foreignId('jenis_faskes_id')->nullable()->constrained('jenis_faskes')->onDelete('set null');
            $table->foreignId('kategori_id')->nullable()->constrained('kategori')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faskes');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('jenis_faskes');
        Schema::dropIfExists('kabkota');
        Schema::dropIfExists('provinsi');
    }
};
