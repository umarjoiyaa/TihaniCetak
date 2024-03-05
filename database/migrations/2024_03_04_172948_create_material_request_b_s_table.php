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
        Schema::create('material_request_b_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->nullable();
            $table->foreign('material_id')->references('id')->on('material_requests')->nullable();
            $table->string('stock_code')->nullable();
            $table->string('group')->nullable();
            $table->string('description')->nullable();
            $table->string('grammage')->nullable();
            $table->string('saiz')->nullable();
            $table->string('uom')->nullable();
            $table->string('available_qty')->nullable();
            $table->string('uom_request')->nullable();
            $table->string('request_qty')->nullable();
            $table->longText('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_request_b_s');
    }
};
