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
        Schema::create('consignments', function (Blueprint $table) {
            $table->id();
            $table->string('consignment_number')->unique();
            $table->date('consignment_date');
            $table->foreignId('company_id');
            $table->foreignId('consignor_id');
            $table->foreignId('consignee_id');
            $table->foreignId('truck_id');
            $table->text('delivery_office_address');
            $table->string('from_location');
            $table->string('to_location');
            $table->boolean('at_owners_risk')->default(true);
            $table->boolean('is_insured')->default(false);
            $table->string('insurance_company')->nullable();
            $table->string('insurance_policy_no')->nullable();
            $table->decimal('insurance_amount', 10, 2)->nullable();
            $table->date('insurance_date')->nullable();
            $table->string('insurance_risk')->nullable();
            $table->decimal('freight_amount', 10, 2);
            $table->string('payment_mode')->default('To Pay Cash Only');
            $table->decimal('igst_rate', 5, 2)->default(0);
            $table->decimal('cgst_rate', 5, 2)->default(0);
            $table->decimal('sgst_rate', 5, 2)->default(0);
            $table->decimal('hamali_union', 10, 2)->default(0);
            $table->decimal('surcharge', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'in_transit', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consignments');
    }
};
