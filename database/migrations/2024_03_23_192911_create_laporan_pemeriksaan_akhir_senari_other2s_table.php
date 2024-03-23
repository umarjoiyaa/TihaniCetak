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
        Schema::create('laporan_pemeriksaan_akhir_senari_other2s', function (Blueprint $table) {
            $table->id();

            $table->string('keputusan_row_pallet')->nullable();
            $table->string('keputusan_row_1')->nullable();
            $table->string('keputusan_row_2')->nullable();
            $table->string('keputusan_row_3')->nullable();
            $table->string('keputusan_row_4')->nullable();
            $table->string('keputusan_row_5')->nullable();
            $table->string('keputusan_row_6')->nullable();
            $table->string('keputusan_row_7')->nullable();
            $table->string('keputusan_row_8')->nullable();
            $table->string('keputusan_row_9')->nullable();
            $table->string('keputusan_row_10')->nullable();
            $table->string('keputusan_row_11')->nullable();
            $table->string('keputusan_row_12')->nullable();
            $table->string('keputusan_row_13')->nullable();
            $table->string('keputusan_row_14')->nullable();
            $table->string('keputusan_row_15')->nullable();
            $table->string('keputusan_row_16')->nullable();
            $table->string('keputusan_row_17')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pemeriksaan_akhir_senari_other2s');
    }
};
