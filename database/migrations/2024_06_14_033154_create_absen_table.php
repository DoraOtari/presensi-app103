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
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal');
            $table->string('jam_masuk')->nullable();
            $table->string('jam_pulang')->nullable();
            $table->string('foto_masuk')->nullable();
            $table->string('foto_pulang')->nullable();
            $table->string('lokasi_masuk')->nullable();
            $table->string('lokasi_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen');
    }
};
