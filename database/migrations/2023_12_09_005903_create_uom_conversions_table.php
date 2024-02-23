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
        Schema::create('uom_conversions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_unit_id');
            $table->foreign('from_unit_id')->references('id')->on('uoms')->onDelete('cascade');
            $table->string('from_value');
            $table->unsignedBigInteger('to_unit_id');
            $table->foreign('to_unit_id')->references('id')->on('uoms')->onDelete('cascade');
            $table->string('to_value');
            $table->unsignedBigInteger('isReverse')->nullable();
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
        Schema::dropIfExists('uom_conversions');
    }
};
