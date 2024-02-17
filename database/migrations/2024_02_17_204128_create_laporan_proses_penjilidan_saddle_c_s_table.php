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
        Schema::create('laporan_proses_penjilidan_saddle_c_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjilidan_id')->nullable();
            $table->foreign('penjilidan_id')->references('id')->on('laporan_proses_penjilidan_saddles')->nullable();
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
        Schema::dropIfExists('laporan_proses_penjilidan_saddle_c_s');
    }
};
