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
        Schema::create('good_receiving_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiving_id')->nullable();
            $table->foreign('receiving_id')->references('id')->on('good_receivings')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('good_receiving_products')->nullable();
            $table->string('area_id')->nullable();
            $table->string('shelf_id')->nullable();
            $table->string('level_id')->nullable();
            $table->string('uom')->nullable();
            $table->string('receiving_qty')->nullable();
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_receiving_locations');
    }
};
