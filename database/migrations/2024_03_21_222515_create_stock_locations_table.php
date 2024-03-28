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
        Schema::create('stock_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('sale_order_other')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('date')->nullable();
            $table->longText('description')->nullable();

            $table->unsignedBigInteger('previous_area_id')->nullable();
            $table->foreign('previous_area_id')->references('id')->on('areas')->nullable();
            $table->unsignedBigInteger('previous_shelf_id')->nullable();
            $table->foreign('previous_shelf_id')->references('id')->on('area_shelves')->nullable();
            $table->unsignedBigInteger('previous_level_id')->nullable();
            $table->foreign('previous_level_id')->references('id')->on('area_levels')->nullable();

            $table->unsignedBigInteger('new_area_id')->nullable();
            $table->foreign('new_area_id')->references('id')->on('areas')->nullable();
            $table->unsignedBigInteger('new_shelf_id')->nullable();
            $table->foreign('new_shelf_id')->references('id')->on('area_shelves')->nullable();
            $table->unsignedBigInteger('new_level_id')->nullable();
            $table->foreign('new_level_id')->references('id')->on('area_levels')->nullable();

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
        Schema::dropIfExists('stock_locations');
    }
};
