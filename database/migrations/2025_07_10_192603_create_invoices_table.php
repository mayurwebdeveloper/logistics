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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consignment_id');
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->enum('invoice_type', ['consignment', 'delivery', 'payment'])->default('consignment');
            $table->string('file_path')->nullable();
            $table->enum('status', ['draft', 'generated', 'sent', 'paid'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
