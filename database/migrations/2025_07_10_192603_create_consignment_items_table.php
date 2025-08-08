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
        Schema::create('consignment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consignment_id');
            $table->integer('package_count');
            $table->string('package_type')->default('Unit');
            $table->text('description');
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->decimal('actual_weight', 8, 2)->nullable();
            $table->decimal('charged_weight', 8, 2)->nullable();
            $table->string('weight_type')->default('FTL');
            $table->string('rate_type')->default('FIX');
            $table->decimal('rate', 8, 2)->nullable();
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignment_items');
    }
};
