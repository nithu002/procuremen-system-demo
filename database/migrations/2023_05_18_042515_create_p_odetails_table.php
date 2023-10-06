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
        Schema::create('p_odetails', function (Blueprint $table) {
            $table->id();
            $table->string('poID')->unique()->nullable();
            $table->string('prID')->nullable();
            $table->string('poDueDate')->nullable();
            $table->string('deliveryDate')->nullable();
            $table->string('pocumerName')->nullable();
            $table->string('pocumerEmail')->nullable();
            $table->string('supervioserName')->nullable();
            $table->string('supervioserEmail')->nullable();
            $table->string('poStatus')->nullable();
            $table->string('supplierName')->nullable();
            $table->string('supplierContact_no')->nullable();
            $table->string('supplierAddress')->nullable();
            $table->string('supplierEmail')->nullable();
            $table->string('totalPO')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_odetails');
    }
};