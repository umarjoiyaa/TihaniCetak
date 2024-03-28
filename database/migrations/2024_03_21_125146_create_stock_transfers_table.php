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
        Schema::create('stock_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('sale_order_other')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('date')->nullable();
            $table->string('do_no')->nullable();
            $table->longText('description')->nullable();
            $table->string('customer')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->nullable();
            $table->string('subcon')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();

            $table->string('receive_by_user')->nullable();
            $table->string('receive_by_department')->nullable();
            $table->string('receive_by_designation')->nullable();
            $table->string('receive_by_date')->nullable();
            $table->string('status')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transfers');
    }
};
