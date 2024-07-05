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
        Schema::create('dispatch_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('buyer_id')->unsigned()->index();
            $table->integer('seller_id')->unsigned()->index();
            $table->integer('contract_id')->unsigned()->index();
            $table->string('lot_no');
            $table->integer('dispatch_quantity');
            $table->integer('factory_weight');
            $table->integer('mill_weight')->nullable();
            $table->integer('moisture')->nullable();
            $table->integer('trash')->nullable();
            $table->integer('tare')->nullable();
            $table->integer('net_weight');
            $table->integer('rate');
            $table->integer('value');
            $table->string('bilty_no')->nullable();
            $table->integer('freight')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('goods_name')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');

            $table->foreign('buyer_id')
            ->references('id')->on('buyers')
            ->onDelete('cascade');

            $table->foreign('seller_id')
            ->references('id')->on('sellers')
            ->onDelete('cascade');

            $table->foreign('contract_id')
            ->references('id')->on('contracts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_entries');
    }
};
