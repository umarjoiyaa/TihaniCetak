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
        Schema::create('other_cover_and_endpapers', function (Blueprint $table) {
            $table->id();
            $table->string('finishing_18')->nullable();
            $table->string('finishing_input_4')->nullable();
            $table->string('finishing_supplier_18')->nullable();
            $table->string('finishing_19')->nullable();
            $table->string('finishing_input_5')->nullable();
            $table->string('finishing_supplier_19')->nullable();
            $table->string('finishing_20')->nullable();
            $table->string('finishing_input_6')->nullable();
            $table->string('finishing_supplier_20')->nullable();
            $table->string('finishing_21')->nullable();
            $table->string('finishing_input_7')->nullable();
            $table->string('finishing_supplier_21')->nullable();
            $table->string('finishing_22')->nullable();
            $table->string('finishing_input_8')->nullable();
            $table->string('finishing_supplier_22')->nullable();

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('cover_and_endpapers')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_cover_and_endpapers');
    }
};
