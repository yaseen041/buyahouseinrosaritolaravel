<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('neighborhoods', function (Blueprint $table) {
            // Add the new column 'city_id'
            $table->unsignedBigInteger('city_id')->nullable()->after('zip');

            // Drop the old 'city' column
            $table->dropColumn('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('neighborhoods', function (Blueprint $table) {
            // Add the old 'city' column back as a string
            $table->string('city')->nullable();


            // Drop the 'city_id' column
            $table->dropColumn('city_id');
        });
    }
};
