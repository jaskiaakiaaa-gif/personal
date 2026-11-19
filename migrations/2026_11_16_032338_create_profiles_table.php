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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kolom nama lengkap sudah ditambahkan di sini
            $table->string('title'); // Contoh: "Web Developer"
            $table->text('bio'); // Deskripsi singkat tentang dirimu
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('photo')->nullable(); // Foto profil (boleh kosong dulu)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};