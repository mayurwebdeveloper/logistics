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
            // Check if truck_id column exists and drop it
            if (Schema::hasColumn('consignments', 'truck_id')) {
                $table->dropColumn('truck_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consignments', function (Blueprint $table) {
            // Add back truck_id foreign key
            $table->foreignId('truck_id')->after('consignee_id');
            $table->foreign('truck_id')->references('id')->on('trucks');
        });
    }
};
