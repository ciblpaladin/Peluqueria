<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_fk");
            $table->date("fecha_disponibilidad");
            $table->time("hora_inicio_disponibilidad");
            $table->time("hora_fin_disponibilidad");
            $table->unsignedBigInteger("state_availability_fk");
            $table->unsignedBigInteger("sede_fk");
            $table->text("notas_disponibilidad",2000);
            $table->timestamps();

            $table->foreign('user_fk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_availability_fk')->references('id')->on('states_availability')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_availability');
    }
};
// ID: Un campo único para identificar cada registro en la tabla.
// Profesional: Una referencia al profesional (médico, en este caso) al que pertenece la disponibilidad.
// Día de la Semana: Un campo para almacenar el día de la semana en que el profesional está disponible.
// Hora de Inicio: La hora en que el profesional comienza a estar disponible en ese día.
// Hora de Finalización: La hora en que el profesional deja de estar disponible en ese día.
// Capacidad: Puede representar la cantidad de citas que el profesional puede atender en ese período de tiempo.
// Estado: Puede ser útil para marcar la disponibilidad como "disponible", "reservado", "fuera de la oficina", etc.
// Ubicación: Si el profesional trabaja en varias ubicaciones, puedes registrar la ubicación específica.
// Notas: Espacio para agregar comentarios o notas adicionales sobre la disponibilidad, requisitos especiales, etc.
// Registro de Creación y Modificación: Campos para registrar cuándo se creó y se modificó el registro.