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
        Schema::create('digital_printing_detail_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('digital_detail_id')->nullable();
            $table->string('last_print')->nullable();
            $table->string('waste_print')->nullable();
            $table->string('rejection')->nullable();
            $table->string('good_count')->nullable();
            $table->string('meter_click')->nullable();
            $table->string('check_operator_text')->nullable();
            $table->string('check_verify_text')->nullable();
            $table->string('hiddenId')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_printing_detail_b_s');
    }
};
