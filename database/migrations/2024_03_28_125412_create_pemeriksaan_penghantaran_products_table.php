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
        Schema::create('pemeriksaan_penghantaran_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemeriksaan_id')->nullable();
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaan_penghantarans')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->string('area')->nullable();
            $table->string('shelf')->nullable();
            $table->string('level')->nullable();
            $table->string('available_qty')->nullable();
            $table->string('qty')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_penghantaran_products');
    }
};
