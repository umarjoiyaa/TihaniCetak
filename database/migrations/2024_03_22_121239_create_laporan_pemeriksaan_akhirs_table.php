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
        Schema::create('laporan_pemeriksaan_akhirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_text')->nullable();
            $table->string('di_bungkus_oleh')->nullable();
            $table->string('status')->nullable();

            $table->string('b_1')->nullable();
            $table->string('b_2')->nullable();
            $table->string('b_3')->nullable();

            $table->string('c_1')->nullable();
            $table->string('c_kuantiti_1')->nullable();
            $table->string('c_2')->nullable();
            $table->string('c_berat_2')->nullable();

            $table->string('d_1')->nullable();
            $table->string('d_2')->nullable();

            $table->string('e_1')->nullable();
            $table->string('e_2')->nullable();
            $table->string('e_3')->nullable();
            $table->string('e_4')->nullable();
            $table->string('e_5')->nullable();
            $table->string('e_6')->nullable();

            $table->string('f_1')->nullable();
            $table->string('f_2')->nullable();
            $table->string('f_3')->nullable();

            $table->string('kauntiti_siap_1')->nullable();
            $table->string('kauntiti_siap_2')->nullable();
            $table->string('kauntiti_siap_3')->nullable();


            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pemeriksaan_akhirs');
    }
};
