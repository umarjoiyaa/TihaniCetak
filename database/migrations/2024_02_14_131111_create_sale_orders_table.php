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
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->nullable();
            $table->string('customer')->nullable();
            $table->string('po_no')->nullable();
            $table->string('terms')->nullable();
            $table->string('date')->nullable();
            $table->string('item')->nullable();
            $table->string('description')->nullable();
            $table->string('uom')->nullable();
            $table->string('sale_order_qty')->nullable();
            $table->string('delivery_qty')->nullable();
            $table->string('remaining_qty')->nullable();
            $table->string('status')->nullable();
            $table->string('kod_buku')->nullable();
            $table->string('catekan')->nullable();
            $table->string('size')->nullable();
            $table->string('pages_cover')->nullable();
            $table->string('pages_text')->nullable();
            $table->string('paper_cover')->nullable();
            $table->string('paper_text')->nullable();
            $table->string('printing_cover')->nullable();
            $table->string('printing_text')->nullable();
            $table->string('finishing')->nullable();
            $table->string('binding')->nullable();
            $table->string('shrinking_wrapping')->nullable();
            $table->string('extra_stock')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('soft_copy')->nullable();
            $table->string('approved_by_date')->nullable();
            $table->string('approved_by_user')->nullable();
            $table->string('approved_by_designation')->nullable();
            $table->string('approved_by_department')->nullable();
            $table->string('published_by_date')->nullable();
            $table->string('published_by_user')->nullable();
            $table->string('published_by_designation')->nullable();
            $table->string('published_by_department')->nullable();
            $table->string('order_status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_orders');
    }
};
