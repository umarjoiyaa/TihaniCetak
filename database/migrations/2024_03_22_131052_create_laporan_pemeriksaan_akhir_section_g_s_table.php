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
        Schema::create('laporan_pemeriksaan_akhir_section_g_s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('laporan_pemeriksaan_akhirs')->nullable();
            // rows columns static
            $table->string('subkontraktor_1')->nullable();
            $table->string('jumlah_1')->nullable();
            $table->string('disahkan_oleh_1')->nullable();
            $table->string('tcsb_1')->nullable();
            $table->string('jumlah_2')->nullable();
            $table->string('disahkan_oleh_2')->nullable();

            $table->string('subkontraktor_2')->nullable();
            $table->string('jumlah_3')->nullable();
            $table->string('disahkan_oleh_3')->nullable();
            $table->string('tcsb_2')->nullable();
            $table->string('jumlah_4')->nullable();
            $table->string('disahkan_oleh_4')->nullable();

            $table->string('subkontraktor_3')->nullable();
            $table->string('jumlah_5')->nullable();
            $table->string('disahkan_oleh_5')->nullable();
            $table->string('tcsb_3')->nullable();
            $table->string('jumlah_6')->nullable();
            $table->string('disahkan_oleh_6')->nullable();

            $table->string('subkontraktor_4')->nullable();
            $table->string('jumlah_7')->nullable();
            $table->string('disahkan_oleh_7')->nullable();
            $table->string('tcsb_4')->nullable();
            $table->string('jumlah_8')->nullable();
            $table->string('disahkan_oleh_8')->nullable();

            $table->string('subkontraktor_5')->nullable();
            $table->string('jumlah_9')->nullable();
            $table->string('disahkan_oleh_9')->nullable();
            $table->string('tcsb_5')->nullable();
            $table->string('jumlah_10')->nullable();
            $table->string('disahkan_oleh_10')->nullable();

            $table->string('subkontraktor_6')->nullable();
            $table->string('jumlah_11')->nullable();
            $table->string('disahkan_oleh_11')->nullable();
            $table->string('tcsb_6')->nullable();
            $table->string('jumlah_12')->nullable();
            $table->string('disahkan_oleh_12')->nullable();

            

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pemeriksaan_akhir_section_g_s');
    }
};
