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
        Schema::create('senari_semak_cetaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('status')->nullable();

            $table->string('item_cover_availibility')->nullable();
            $table->string('item_leaflet_availibility')->nullable();
            $table->string('item_cover_text')->nullable();

            $table->string('bahagian_b_1')->nullable();
            $table->string('bahagian_b_2')->nullable();
            $table->string('bahagian_b_3')->nullable();
            $table->string('bahagian_b_4')->nullable();
            $table->string('bahagian_b_5')->nullable();
            $table->string('bahagian_b_6')->nullable();
            $table->string('bahagian_b_7')->nullable();
            $table->string('bahagian_b_8')->nullable();
            $table->string('bahagian_b_9')->nullable();
            $table->string('bahagian_b_p4_1')->nullable();
            $table->string('bahagian_b_p4_2')->nullable();
            $table->string('bahagian_b_p4_3')->nullable();
            $table->string('bahagian_b_p3_1')->nullable();
            $table->string('bahagian_b_p3_2')->nullable();
            $table->string('bahagian_b_p3_3')->nullable();
            $table->string('bahagian_b_p1_1')->nullable();

            $table->string('gripper_margin_cover')->nullable();
            $table->string('gripper_margin_teks')->nullable();
            $table->string('gripper_margin_leaflet')->nullable();

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
        Schema::dropIfExists('senari_semak_cetaks');
    }
};
