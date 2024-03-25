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
        Schema::create('perfect_bind_details', function (Blueprint $table) {
            $table->id();
            $table->string('perfect_id')->nullable();
            $table->string('machine')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('duration')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->string('operator')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfect_bind_details');
    }
};
