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
        Schema::create('text_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('text_id')->nullable();
            $table->foreign('text_id')->references('id')->on('texts')->nullable();
            $table->string('seksyen_no')->nullable();
            $table->string('date')->nullable();
            $table->string('machine')->nullable();
            $table->string('side')->nullable();
            $table->string('last_print')->nullable();
            $table->string('kuantiti_waste')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_details');
    }
};
