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
        Schema::create('borang_serah_kerja_kulits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->string('po_no')->nullable();
            $table->string('nama')->nullable();
            $table->string('qty')->nullable();
            $table->string('size')->nullable();

            //jenis Finishing code
            $table->string('jenis_1')->nullable();
            $table->string('jenis_input_1')->nullable();
            $table->string('jenis_2')->nullable();
            $table->string('jenis_3')->nullable();
            $table->string('jenis_4')->nullable();
            $table->string('jenis_5')->nullable();
            $table->string('jenis_6')->nullable();
            $table->string('jenis_7')->nullable();
            $table->string('jenis_8')->nullable();
            $table->string('jenis_9')->nullable();
            $table->string('jenis_input_9')->nullable();
            $table->string('jenis_10')->nullable();
            $table->string('jenis_11')->nullable();
            $table->string('jenis_12')->nullable();
            $table->string('jenis_input_12')->nullable();
            $table->string('jenis_13')->nullable();
            $table->string('jenis_14')->nullable();
            $table->string('jenis_15')->nullable();
            $table->string('jenis_16')->nullable();
            $table->string('jenis_17')->nullable();
            $table->string('jenis_18')->nullable();
            $table->string('jenis_19')->nullable();
            $table->string('jenis_20')->nullable();
            $table->string('jenis_21')->nullable();
            $table->string('jenis_22')->nullable();
            $table->string('jenis_input_22')->nullable();
            $table->string('jenis_23')->nullable();
            $table->string('jenis_input_23')->nullable();
            $table->string('jenis_24')->nullable();
            $table->string('jenis_input_24')->nullable();
            $table->string('jenis_25')->nullable();
            $table->string('jenis_input_25')->nullable();
            $table->string('jenis_26')->nullable();
            $table->string('jenis_input_26')->nullable();
            $table->string('jenis_27')->nullable();
            $table->string('jenis_input_27')->nullable();






            $table->string('siap_1')->nullable();
            $table->string('date_line')->nullable();

            $table->string('purchased_by_date')->nullable();
            $table->string('purchased_by_user')->nullable();
            $table->string('purchased_by_designation')->nullable();
            $table->string('purchased_by_department')->nullable();
            $table->string('purchased_by_remarks')->nullable();

            $table->string('transfer_by_date')->nullable();
            $table->string('transfer_by_user')->nullable();
            $table->string('transfer_by_designation')->nullable();
            $table->string('transfer_by_department')->nullable();
            $table->string('transfer_by_remarks')->nullable();


            $table->string('received_by_date')->nullable();
            $table->string('received_by_user')->nullable();
            $table->string('received_by_designation')->nullable();
            $table->string('received_by_department')->nullable();
            $table->string('received_by_remarks')->nullable();


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
        Schema::dropIfExists('borang_serah_kerja_kulits');
    }
};
