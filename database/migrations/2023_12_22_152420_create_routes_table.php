<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_point');
            $table->unsignedBigInteger('end_point');
            $table->foreign('start_point')
                ->references('id')
                ->on('locations')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('end_point')
                ->references('id')
                ->on('locations')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->json('stoppages');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
