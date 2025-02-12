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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('GLA')->nullable();
            $table->string('GLA_mt')->nullable();
            $table->string('size_mt')->nullable()->after('size');
            $table->string('avg_ft')->nullable();
            $table->string('avg_mt')->nullable();
            $table->text('files')->nullable();
            $table->unsignedBigInteger('agent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('GLA');
            $table->dropColumn('GLA_sq');
            $table->dropColumn('size_sq');
            $table->dropColumn('files');
            $table->dropColumn('agent');
        });
    }
};
