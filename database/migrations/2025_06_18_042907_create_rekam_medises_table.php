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
        Schema::create('rekam_medises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftarans')->onDelete('cascade');
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');

            // Vital Signs
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('tekanan_darah');
            $table->string('tempratur');
            $table->string('denyut_nadi');

            // Medical Information
            $table->text('keluhan_utama');
            $table->text('riwayat_penyakit')->nullable();
            $table->text('diagnosis');
            $table->text('rencana_pengobatan');
            $table->text('resep_obat');
            $table->text('notes');

            // Follow Up
            $table->date('kunjungan_berikutnya')->nullable();
            $table->text('catatan_berikutnya')->nullable();
            $table->timestamps();

            // index for search medical records
            $table->index(['pasien_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medises');
    }
};
