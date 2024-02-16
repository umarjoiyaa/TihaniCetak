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
        Schema::create('senari_semak_cetak_bahagia_a_s', function (Blueprint $table) {
            $table->id();

            $table->string('bahagian_a_1')->nullable();
            $table->string('bahagian_a_2')->nullable();
            $table->string('bahagian_a_3')->nullable();
            $table->string('bahagian_a_4')->nullable();
            $table->string('bahagian_a_5')->nullable();
            $table->string('bahagian_a_6')->nullable();
            $table->string('bahagian_a_7')->nullable();
            $table->string('bahagian_a_8')->nullable();
            $table->string('bahagian_a_9')->nullable();
            $table->string('bahagian_a_10')->nullable();
            $table->string('bahagian_a_11')->nullable();
            $table->string('bahagian_a_12')->nullable();
            $table->string('bahagian_a_13')->nullable();
            $table->string('bahagian_a_14')->nullable();
            $table->string('bahagian_a_15')->nullable();
            $table->string('bahagian_a_16')->nullable();
            $table->string('bahagian_a_17')->nullable();
            $table->string('bahagian_a_18')->nullable();
            $table->string('bahagian_a_19')->nullable();
            $table->string('bahagian_a_20')->nullable();
            $table->string('bahagian_a_21')->nullable();

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
        Schema::dropIfExists('senari_semak_cetak_bahagia_a_s');
    }
};
