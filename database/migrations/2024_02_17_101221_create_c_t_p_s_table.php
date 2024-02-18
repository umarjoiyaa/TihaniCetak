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
        Schema::create('c_t_p_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->text('verified_by_date')->nullable();
            $table->text('verified_by_user')->nullable();
            $table->text('verified_by_designation')->nullable();
            $table->text('verified_by_department')->nullable();

            $table->string('file_artwork_1')->nullable();
            $table->string('file_artwork_2')->nullable();
            $table->string('file_artwork_3')->nullable();
            $table->string('file_artwork_4')->nullable();
            $table->string('file_artwork_5')->nullable();
            $table->string('file_artwork_6')->nullable();
            $table->string('file_artwork_7')->nullable();
            $table->string('file_artwork_8')->nullable();

            $table->string('impositions_1')->nullable();
            $table->string('impositions_2')->nullable();
            $table->string('impositions_3')->nullable();
            $table->string('impositions_4')->nullable();
            $table->string('impositions_5')->nullable();
            $table->string('impositions_6')->nullable();
            $table->string('impositions_7')->nullable();
            $table->string('impositions_8')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_t_p_s');
    }
};
