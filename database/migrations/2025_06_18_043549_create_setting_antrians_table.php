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
        Schema::create('setting_antrians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->date('date');
            $table->integer('max_pasien')->default(50);
            $table->integer('antrian_terakhir')->default(0);
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('estimasi_menit_per_pasien')->default(15);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['dokter_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_antrians');
    }
};
