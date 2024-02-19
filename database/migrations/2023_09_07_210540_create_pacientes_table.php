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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->integer('ci');
            $table->string('nombre',45);
            $table->string('paterno',45);
            $table->string('materno',45)->nullable();
            $table->string('sexo',45);
            $table->string('estadocivil',45);
            $table->string('ocupacion',45);
            $table->integer('celular');
            $table->integer('edad');
            $table->date('fechanac');
            $table->string('direccion',150);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
