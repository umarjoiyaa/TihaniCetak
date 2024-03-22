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
        Schema::create('laporan_pemeriksaan_akhir_section_g2_s', function (Blueprint $table) {
            $table->id();
            $table->string('subkontraktor_7')->nullable();
            $table->string('jumlah_13')->nullable();
            $table->string('disahkan_oleh_13')->nullable();
            $table->string('tcsb_7')->nullable();
            $table->string('jumlah_14')->nullable();
            $table->string('disahkan_oleh_14')->nullable();

            $table->string('subkontraktor_8')->nullable();
            $table->string('jumlah_15')->nullable();
            $table->string('disahkan_oleh_15')->nullable();
            $table->string('tcsb_8')->nullable();
            $table->string('jumlah_16')->nullable();
            $table->string('disahkan_oleh_16')->nullable();

            $table->string('subkontraktor_9')->nullable();
            $table->string('jumlah_17')->nullable();
            $table->string('disahkan_oleh_17')->nullable();
            $table->string('tcsb_9')->nullable();
            $table->string('jumlah_18')->nullable();
            $table->string('disahkan_oleh_18')->nullable();

            $table->string('subkontraktor_10')->nullable();
            $table->string('jumlah_19')->nullable();
            $table->string('disahkan_oleh_19')->nullable();
            $table->string('tcsb_10')->nullable();
            $table->string('jumlah_20')->nullable();
            $table->string('disahkan_oleh_20')->nullable();

            $table->string('subkontraktor_11')->nullable();
            $table->string('jumlah_21')->nullable();
            $table->string('disahkan_oleh_21')->nullable();
            $table->string('tcsb_11')->nullable();
            $table->string('jumlah_22')->nullable();
            $table->string('disahkan_oleh_22')->nullable();

            $table->string('subkontraktor_12')->nullable();
            $table->string('jumlah_23')->nullable();
            $table->string('disahkan_oleh_23')->nullable();
            $table->string('tcsb_12')->nullable();
            $table->string('jumlah_24')->nullable();
            $table->string('disahkan_oleh_24')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pemeriksaan_akhir_section_g2_s');
    }
};
