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
        Schema::create('dispatch_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id')->unsigned()->index();
            $table->integer('seller_id')->unsigned()->index();
            $table->string('truck_no');
            $table->string('builty_no');
            $table->string('lot_no');
            $table->integer('factory_weight');
            $table->string('payment_station');
            $table->string('transport_company');
            $table->integer('freight');
            $table->text('remarks')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_notes');
    }
};
