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
        Schema::create('diarys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("empleado_fk");
            $table->unsignedBigInteger("cliente_fk");
            $table->unsignedBigInteger("servicio_fk");
            $table->unsignedBigInteger("sede_fk");
            $table->date("fecha_agenda");
            $table->time("hora_agenda");
            $table->boolean("delete_soft");


            $table->foreign('empleado_fk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cliente_fk')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('servicio_fk')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('sede_fk')->references('id')->on('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
