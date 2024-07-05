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
        Schema::create('paid_income_tax_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id')->unsigned()->index();
            $table->string('buyer_station', 250);
            $table->integer('seller_id')->unsigned()->index();
            $table->string('seller_station', 250);
            $table->bigInteger('tax_amount');
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
        Schema::dropIfExists('paid_income_tax_entries');
    }
};
