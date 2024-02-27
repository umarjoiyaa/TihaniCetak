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
        Schema::create('mesin_knife_detail_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('knife_detail_id')->nullable();
            $table->string('good_count')->nullable();
            $table->string('rejection')->nullable();
            $table->string('total_produce')->nullable();
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
        Schema::dropIfExists('mesin_knife_detail_b_s');
    }
};
