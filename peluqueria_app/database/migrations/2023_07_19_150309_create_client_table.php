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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_cliente", 50);
            $table->string("apellido_cliente", 50);
            $table->string("cedula_cliente", 50);
            $table->string("celular_cliente", 50);
            $table->string("correo_cliente", 50);
            $table->string("password_cliente", 200);
            $table->unsignedBigInteger("ciudad_fk");
            $table->boolean("delete_soft");


            $table->foreign('ciudad_fk')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('client');
    }
};
