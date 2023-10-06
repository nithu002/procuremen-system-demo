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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('reqno')->nullable();
            $table->string('req_name');
            $table->string('reqdate')->nullable();
            $table->string('wbsnumber')->nullable();
            $table->string('budget')->nullable();
            $table->string('actual')->nullable();
            $table->string('scheduled')->nullable();
            $table->string('balance')->nullable();
            $table->string('purpose')->nullable();
            $table->string('FTotal')->nullable();
            $table->string('file_tor')->nullable();
            $table->string('file_cn')->nullable();
            $table->string('need_date')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_email')->nullable();
            $table->string('status_now')->nullable();
            $table->string('single_source')->nullable();
            $table->string('single_sourceText')->nullable();
            $table->string('quotation1')->nullable();
            $table->string('quotation2')->nullable();
            $table->string('quotation3')->nullable();
            $table->string('bidAnalysis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
