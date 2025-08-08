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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('gst_no')->nullable()->after('name');
            $table->text('address')->nullable()->after('gst_no');
            $table->string('mobile_no')->nullable()->after('address');
            $table->string('second_person_name')->nullable()->after('mobile_no');
            $table->string('mobile_no2')->nullable()->after('second_person_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['gst_no', 'address', 'mobile_no', 'second_person_name', 'mobile_no2']);
        });
    }
};
