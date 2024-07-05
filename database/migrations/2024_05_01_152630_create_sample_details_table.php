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
        Schema::create('sample_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_no');
            $table->string('attenstion')->nullable();
            $table->integer('buyer_id')->unsigned()->index();
            $table->string('address');
            $table->integer('seller_id')->unsigned()->index();
            $table->string('station', 250);
            $table->date('dispatch_date');
            $table->string('dispatch_station', 250);
            $table->string('courier');
            $table->string('courier_slip_no');
            $table->string('lot_no');
            $table->bigInteger('number_of_samples');
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
        Schema::dropIfExists('sample_details');
    }
};
