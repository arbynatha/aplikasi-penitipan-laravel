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
        Schema::create('titips', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 5);
            $table->string('nama_pemilik', 50);
            $table->time('jam_masuk');
            $table->string('hitung_jam_masuk', 5);
            $table->string('status', 2);
            $table->time('jam_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titips');
    }
};
