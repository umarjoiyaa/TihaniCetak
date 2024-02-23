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
        Schema::create('senari_semak_cetak_bahagia_c_s', function (Blueprint $table) {
            $table->id();

            $table->string('bahagian_c_1')->nullable();
            $table->string('bahagian_c_2')->nullable();
            $table->string('bahagian_c_3')->nullable();
            $table->string('bahagian_c_4')->nullable();
            $table->string('bahagian_c_5')->nullable();
            $table->string('bahagian_c_6')->nullable();

            $table->unsignedBigInteger('senari_semak_cetak_id')->nullable();
            $table->foreign('senari_semak_cetak_id')->references('id')->on('senari_semak_cetaks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senari_semak_cetak_bahagia_c_s');
    }
};
