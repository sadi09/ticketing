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
        Schema::table('stoppages', function (Blueprint $table) {
            $table->foreignId('route_id')->after('id')->constrained();
            $table->foreignId('location_id')->after('route_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stoppages', function (Blueprint $table) {
            $table->dropConstrainedForeignId('route_id');
            $table->dropConstrainedForeignId('location_id');
        });
    }
};
