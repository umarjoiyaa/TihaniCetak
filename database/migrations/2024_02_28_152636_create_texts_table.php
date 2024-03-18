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
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->string('mesin')->nullable();
            $table->string('kuantiti_waste')->nullable();
            $table->string('kertas')->nullable();
            $table->string('saiz_potong')->nullable();
            $table->longText('arahan_kerja')->nullable();
            $table->string('plate')->nullable();
            $table->string('print')->nullable();
            $table->string('waste_paper')->nullable();
            $table->string('last_print')->nullable();
            $table->string('seksyen_no')->nullable();
            $table->longText('catatan')->nullable();

            $table->string('binding_1')->nullable();
            $table->string('binding_2')->nullable();
            $table->string('binding_3')->nullable();
            $table->string('binding_4')->nullable();
            $table->string('binding_5')->nullable();
            $table->string('binding_6')->nullable();
            $table->string('binding_7')->nullable();
            $table->string('binding_8')->nullable();
            $table->string('binding_9')->nullable();
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
            $table->string('binding_20')->nullable();

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
        Schema::dropIfExists('texts');
    }
};
