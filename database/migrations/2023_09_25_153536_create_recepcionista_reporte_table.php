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
        Schema::create('recepcionista_reporte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recepcionista_id')->nullable();
            $table->unsignedBigInteger('reporte_id')->nullable();
            $table->foreign('recepcionista_id')->references('id')->on('recepcionistas')->onDelete('cascade');
            $table->foreign('reporte_id')->references('id')->on('reportes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcionista_reporte');
    }
};
