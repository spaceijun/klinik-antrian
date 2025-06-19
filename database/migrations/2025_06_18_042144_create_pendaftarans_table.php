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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->dateTime('tgl_pendaftaran');
            $table->string('queue_number', 10); // Format A001,A002
            $table->integer('queue_position'); // Urutan antrian
            $table->enum('status', ['Terdaftar', 'Menunggu', 'Diproses', 'Selesai', 'Batal'])->default('Terdaftar');
            $table->text('keluhan_utama');
            $table->text('catatan')->nullable();
            $table->timestamp('registered_at')->userCurrent();
            $table->timestamp('called_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            // index untuk optimasi query
            $table->index(['tgl_pendaftaran', 'dokter_id']);
            $table->index(['status', 'queue_position']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
