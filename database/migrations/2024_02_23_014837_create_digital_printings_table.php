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
        Schema::create('digital_printings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_order_id')->nullable();
            $table->foreign('sale_order_id')->references('id')->on('sale_orders')->nullable();
            $table->string('date')->nullable();
            $table->string('jumlah_mukasurat')->nullable();
            $table->string('kuantiti_waste')->nullable();
            $table->string('mesin')->nullable();
            $table->string('mesin_others')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('kategori_job')->nullable();
            $table->string('jenis_produk')->nullable();
            $table->string('jenis_produk_others')->nullable();
            $table->string('kertas_teks')->nullable();
            $table->string('kertas_cover')->nullable();
            $table->string('status')->nullable();

            $table->string('text_front')->nullable();
            $table->string('text_back')->nullable();
            $table->string('text_print')->nullable();
            $table->string('text_jumlah_up')->nullable();
            $table->string('text_print_cut')->nullable();
            $table->string('text_print_cut_others')->nullable();

            $table->string('cover_front')->nullable();
            $table->string('cover_back')->nullable();
            $table->string('cover_print')->nullable();
            $table->string('cover_print_cut')->nullable();
            $table->string('cover_print_cut_others')->nullable();

            $table->string('finishing_1')->nullable();
            $table->string('finishing_2')->nullable();
            $table->string('finishing_3')->nullable();
            $table->string('finishing_4')->nullable();
            $table->string('finishing_5')->nullable();
            $table->string('finishing_6')->nullable();
            $table->string('finishing_7')->nullable();
            $table->string('finishing_8')->nullable();
            $table->string('finishing_9')->nullable();
            $table->string('finishing_10')->nullable();
            $table->string('finishing_11')->nullable();

            $table->string('binding_1')->nullable();
            $table->string('binding_2')->nullable();
            $table->string('binding_3')->nullable();
            $table->string('binding_4')->nullable();
            $table->string('binding_5')->nullable();
            $table->string('binding_6')->nullable();
            $table->string('binding_7')->nullable();
            $table->string('binding_8')->nullable();
            $table->string('binding_9')->nullable();

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
        Schema::dropIfExists('digital_printings');
    }
};
