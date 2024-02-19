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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->text('motivo');
            $table->text('enfermedad');
            $table->text('antepat');
            $table->text('antenopat');
            $table->text('antegine');
            $table->text('antefam');
            $table->text('anamnesis');
            $table->text('examenfis');
            $table->text('laboratorio');
            $table->text('tratamiento');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes')
            ->onDelete('set null');
            $table->foreign('medico_id')->references('id')->on('medicos')
            ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
