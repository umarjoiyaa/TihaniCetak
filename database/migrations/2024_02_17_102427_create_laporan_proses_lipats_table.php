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
        Schema::create('laporan_proses_lipats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('mesin')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_text')->nullable();
            $table->string('seksyen_no')->nullable();
            $table->string('verified_by_date')->nullable();
            $table->string('verified_by_user')->nullable();
            $table->string('verified_by_designation')->nullable();
            $table->string('verified_by_department')->nullable();
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
        Schema::dropIfExists('laporan_proses_lipats');
    }
};