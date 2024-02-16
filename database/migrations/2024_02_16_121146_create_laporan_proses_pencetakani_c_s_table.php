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
        Schema::create('laporan_proses_pencetakani_c_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laporan_proses')->nullable();
            $table->foreign('laporan_proses')->references('id')->on('laporan_proses_pencetakanis')->nullable();

            $table->string('c_1')->nullable();
            $table->string('c_2')->nullable();
            $table->string('c_3')->nullable();
            $table->string('c_4')->nullable();
            $table->string('c_5')->nullable();
            $table->string('c_6')->nullable();
            $table->string('c_7')->nullable();
            $table->string('c_8')->nullable();
            $table->string('c_9')->nullable();
            $table->string('c_10')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_proses_pencetakani_c_s');
    }
};
