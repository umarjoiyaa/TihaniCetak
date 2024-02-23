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
        Schema::create('plate_cetaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('status')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->string('machine')->nullable();
            $table->integer('section')->nullable();
            $table->string('section_plate')->nullable();
            $table->text('verified_by_date')->nullable();
            $table->text('verified_by_user')->nullable();
            $table->text('verified_by_designation')->nullable();
            $table->text('verified_by_department')->nullable();

            $table->string('warna_1')->nullable();
            $table->string('warna_2')->nullable();
            $table->string('warna_3')->nullable();
            $table->string('warna_4')->nullable();
            $table->string('warna_5')->nullable();
            $table->string('warna_6')->nullable();
            $table->string('warna_7')->nullable();
            $table->string('warna_8')->nullable();
            $table->string('warna_9')->nullable();
            $table->string('warna_10')->nullable();
            $table->string('warna_11')->nullable();
            $table->string('warna_12')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate_cetaks');
    }
};
