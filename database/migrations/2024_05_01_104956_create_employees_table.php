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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->integer('city_id')->unsigned()->index();
            $table->string('designation', 250);
            $table->date('date_of_birth');
            $table->string('cnic_number');
            $table->date('date_of_joining');
            $table->string('address');
            $table->bigInteger('salary');
            $table->string('phone')->nullable();
            $table->string('cell')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
