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
        Schema::create('good_receivings', function (Blueprint $table) {
            $table->id();
            $table->string('doc_key')->nullable();
            $table->string('doc_no')->nullable();
            $table->string('doc_date')->nullable();
            $table->string('date')->nullable();
            $table->string('incomming_qty')->nullable();
            $table->string('receive_qty')->nullable();
            $table->string('po_no')->nullable();
            $table->string('creditor_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_receivings');
    }
};
