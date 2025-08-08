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
        Schema::table('consignments', function (Blueprint $table) {
            // Add truck fields directly to consignments table
            if (!Schema::hasColumn('consignments', 'truck_number')) {
                $table->string('truck_number')->after('consignee_id');
            }
            if (!Schema::hasColumn('consignments', 'driver_name')) {
                $table->string('driver_name')->after('truck_number');
            }
            if (!Schema::hasColumn('consignments', 'driver_phone')) {
                $table->string('driver_phone')->nullable()->after('driver_name');
            }
            if (!Schema::hasColumn('consignments', 'driver_license')) {
                $table->string('driver_license')->nullable()->after('driver_phone');
            }
            if (!Schema::hasColumn('consignments', 'capacity')) {
                $table->decimal('capacity', 8, 2)->nullable()->after('driver_license');
            }
            if (!Schema::hasColumn('consignments', 'truck_type')) {
                $table->string('truck_type')->nullable()->after('capacity');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consignments', function (Blueprint $table) {
            // Remove truck fields
            $table->dropColumn([
                'truck_number',
                'driver_name',
                'driver_phone',
                'driver_license',
                'capacity',
                'truck_type'
            ]);
        });
    }
}; 