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
        Schema::create('cover_and_endpapers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('kuantiti_waste')->nullable();
            $table->string('jenis')->nullable();
            $table->string('mesin')->nullable();
            $table->string('other_product')->nullable();
            $table->longText('arahan_texteditor')->nullable();
            $table->longText('catatan_texteditor')->nullable();
            $table->string('other_input')->nullable();
            $table->string('print')->nullable();
            $table->string('waste_paper')->nullable();
            $table->string('print_cut')->nullable();
            $table->string('last_print')->nullable();
            $table->string('plate')->nullable();

            $table->string('kertas')->nullable();
            $table->string('saiz_potong')->nullable();
            $table->string('front')->nullable();
            $table->string('back')->nullable();

            //finishing code
            $table->string('finishing_1')->nullable();
            $table->string('finishing_input_1')->nullable();
            $table->string('finishing_supplier_1')->nullable();
            $table->string('finishing_2')->nullable();
            $table->string('finishing_supplier_2')->nullable();
            $table->string('finishing_3')->nullable();
            $table->string('finishing_supplier_3')->nullable();
            $table->string('finishing_4')->nullable();
            $table->string('finishing_supplier_4')->nullable();
            $table->string('finishing_5')->nullable();
            $table->string('finishing_supplier_5')->nullable();
            $table->string('finishing_6')->nullable();
            $table->string('finishing_input_2')->nullable();
            $table->string('finishing_supplier_6')->nullable();
            $table->string('finishing_7')->nullable();
            $table->string('finishing_supplier_7')->nullable();
            $table->string('finishing_8')->nullable();
            $table->string('finishing_supplier_8')->nullable();
            $table->string('finishing_9')->nullable();
            $table->string('finishing_supplier_9')->nullable();
            $table->string('finishing_10')->nullable();
            $table->string('finishing_supplier_10')->nullable();
            $table->string('finishing_11')->nullable();
            $table->string('finishing_supplier_11')->nullable();
            $table->string('finishing_12')->nullable();
            $table->string('finishing_supplier_12')->nullable();
            $table->string('finishing_13')->nullable();
            $table->string('finishing_supplier_13')->nullable();
            $table->string('finishing_14')->nullable();
            $table->string('finishing_supplier_14')->nullable();
            $table->string('finishing_15')->nullable();
            $table->string('finishing_supplier_15')->nullable();
            $table->string('finishing_16')->nullable();
            $table->string('finishing_supplier_16')->nullable();
            $table->string('finishing_17')->nullable();
            $table->string('finishing_input_3')->nullable();
            $table->string('finishing_supplier_17')->nullable();
            $table->string('status')->nullable();



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
        Schema::dropIfExists('cover_and_endpapers');
    }
};
