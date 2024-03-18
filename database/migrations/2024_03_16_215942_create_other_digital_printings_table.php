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
        Schema::create('other_digital_printings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Parent_id')->nullable();
            $table->foreign('Parent_id')->references('id')->on('digital_printings')->nullable();
            $table->string('binding_10')->nullable();
            $table->string('binding_11')->nullable();
            $table->string('binding_12')->nullable();
            $table->string('binding_13')->nullable();
            $table->string('binding_14')->nullable();
            $table->string('binding_15')->nullable();
            $table->string('binding_16')->nullable();
            $table->string('binding_17')->nullable();
            $table->string('binding_18')->nullable();
            $table->string('binding_19')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_digital_printings');
    }
};
