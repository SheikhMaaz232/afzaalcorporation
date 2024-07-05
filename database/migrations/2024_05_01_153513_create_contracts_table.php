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
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('contract_date');
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('seller_id');
            $table->foreign('buyer_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('quantity');
            $table->bigInteger('rate');
            $table->string('moisture');
            $table->string('moisture_type');
            $table->string('trash');
            $table->string('trash_type');
            $table->string('delivery');
            $table->string('weight');
            $table->integer('payment_id');
            $table->string('remarks')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
