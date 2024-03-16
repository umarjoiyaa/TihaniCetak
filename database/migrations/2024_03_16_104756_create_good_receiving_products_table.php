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
        Schema::create('good_receiving_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiving_id')->nullable();
            $table->foreign('receiving_id')->references('id')->on('good_receivings')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->foreign('received_by')->references('id')->on('users')->nullable();
            $table->string('item_code')->nullable();
            $table->string('description')->nullable();
            $table->string('uom')->nullable();
            $table->string('quantity')->nullable();
            $table->string('receiving_qty')->nullable();
            $table->string('delivery_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_receiving_products');
    }
};
