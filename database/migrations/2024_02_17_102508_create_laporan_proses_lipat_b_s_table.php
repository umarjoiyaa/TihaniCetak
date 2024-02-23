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
        Schema::create('laporan_proses_lipat_b_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proses_lipat_id')->nullable();
            $table->foreign('proses_lipat_id')->references('id')->on('laporan_proses_lipats')->nullable();
            $table->string('b_1')->nullable();
            $table->string('b_2')->nullable();
            $table->string('b_3')->nullable();
            $table->string('b_4')->nullable();
            $table->string('b_5')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_proses_lipat_b_s');
    }
};
