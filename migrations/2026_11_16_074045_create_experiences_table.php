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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('role'); // Contoh: Ketua OSIS / Web Developer
            $table->string('company'); // Contoh: SMA Negeri / Nama Instansi
            $table->string('year'); // Contoh: 2024 - 2025
            $table->text('description'); // Deskripsi kegiatan atau tugas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
