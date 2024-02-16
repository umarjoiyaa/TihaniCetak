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
        Schema::create('laporan_proses_pencetakanis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_text')->nullable();
            $table->string('seksyen_no')->nullable();
            $table->string('kuaniti_waste')->nullable();
            $table->string('kuaniti_cetakan')->nullable();
            $table->string('status')->nullable();

            $table->string('b_1')->nullable();
            $table->string('b_2')->nullable();
            $table->string('b_3')->nullable();
            $table->string('b_4')->nullable();
            $table->string('b_5')->nullable();
            $table->string('b_6')->nullable();
            $table->string('b_7')->nullable();
            $table->string('b_8')->nullable();
            $table->string('b_9')->nullable();
            $table->string('b_10')->nullable();

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
        Schema::dropIfExists('laporan_proses_pencetakanis');
    }
};
