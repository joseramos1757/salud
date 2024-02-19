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
        Schema::create('diagnostico_reporte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diagnostico_id');
            $table->unsignedBigInteger('reporte_id');
            $table->foreign('diagnostico_id')->references('id')->on('diagnosticos')->onDelete('cascade');
            $table->foreign('reporte_id')->references('id')->on('reportes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostico_reporte');
    }
};
