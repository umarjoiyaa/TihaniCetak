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
        Schema::create('printing_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('text_id')->nullable();
            $table->foreign('text_id')->references('id')->on('texts')->nullable();
            $table->string('machine')->nullable();
            $table->string('status')->nullable();

            $table->string('operator')->nullable();
            $table->string('verified_by_date')->nullable();
            $table->string('verified_by_user')->nullable();
            $table->string('verified_by_designation')->nullable();
            $table->string('verified_by_department')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printing_processes');
    }
};
