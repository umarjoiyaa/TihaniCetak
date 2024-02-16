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
        Schema::create('senari_semaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('status')->nullable();
            $table->text('verified_by_date')->nullable();
            $table->text('verified_by_user')->nullable();
            $table->text('verified_by_designation')->nullable();
            $table->text('verified_by_department')->nullable();

            $table->string('bahagian_a_1_cover')->nullable();
            $table->string('bahagian_a_1_text')->nullable();
            $table->string('bahagian_a_2_cover')->nullable();
            $table->string('bahagian_a_2_text')->nullable();
            $table->string('bahagian_a_3_cover')->nullable();
            $table->string('bahagian_a_3_text')->nullable();
            $table->string('bahagian_a_4_cover')->nullable();
            $table->string('bahagian_a_4_text')->nullable();
            $table->string('bahagian_a_5_cover')->nullable();
            $table->string('bahagian_a_6_cover')->nullable();
            $table->string('bahagian_a_7_text')->nullable();
            $table->string('bahagian_a_8_text')->nullable();
            $table->string('bahagian_a_9_text')->nullable();
            $table->string('bahagian_a_10_text')->nullable();

            $table->string('bahagian_b_1_text')->nullable();
            $table->string('bahagian_b_1_cover')->nullable();
            $table->string('bahagian_b_2_text')->nullable();
            $table->string('bahagian_b_2_cover')->nullable();
            $table->string('bahagian_b_3_text')->nullable();
            $table->string('bahagian_b_3_cover')->nullable();
            $table->string('bahagian_b_4_text')->nullable();
            $table->string('bahagian_b_4_cover')->nullable();
            $table->string('bahagian_b_5_text')->nullable();
            $table->string('bahagian_b_5_cover')->nullable();
            $table->string('bahagian_b_6_text')->nullable();
            $table->string('bahagian_b_6_cover')->nullable();
            $table->string('bahagian_b_7_text')->nullable();
            $table->string('bahagian_b_7_cover')->nullable();
            $table->string('bahagian_b_8_text')->nullable();
            $table->string('bahagian_b_8_cover')->nullable();
            $table->string('bahagian_b_9_text')->nullable();
            $table->string('bahagian_b_9_cover')->nullable();
            $table->string('bahagian_b_10_text')->nullable();
            $table->string('bahagian_b_10_cover')->nullable();
            $table->string('bahagian_b_11_text')->nullable();
            $table->string('bahagian_b_11_cover')->nullable();

            $table->string('bahagian_c_1_text')->nullable();
            $table->string('bahagian_c_1_cover')->nullable();
            $table->string('bahagian_c_2_text')->nullable();
            $table->string('bahagian_c_2_cover')->nullable();
            $table->string('bahagian_c_3_text')->nullable();
            $table->string('bahagian_c_3_cover')->nullable();
            $table->string('bahagian_c_4_text')->nullable();
            $table->string('bahagian_c_4_cover')->nullable();
            $table->string('bahagian_c_5_text')->nullable();
            $table->string('bahagian_c_5_cover')->nullable();
            $table->string('bahagian_c_6_text')->nullable();
            $table->string('bahagian_c_6_cover')->nullable();
            $table->string('bahagian_c_7_text')->nullable();
            $table->string('bahagian_c_7_cover')->nullable();
            $table->string('bahagian_c_8_text')->nullable();
            $table->string('bahagian_c_8_cover')->nullable();
            $table->string('bahagian_c_9_text')->nullable();
            $table->string('bahagian_c_9_cover')->nullable();
            $table->string('bahagian_c_10_text')->nullable();
            $table->string('bahagian_c_10_cover')->nullable();
            $table->string('bahagian_c_11_input')->nullable();
            $table->string('bahagian_c_11_text')->nullable();
            $table->string('bahagian_c_11_cover')->nullable();

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
        Schema::dropIfExists('senari_semaks');
    }
};
