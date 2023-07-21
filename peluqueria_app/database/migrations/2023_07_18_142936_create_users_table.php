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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_usuario");
            $table->string("apellidos_usuario");
            $table->string("cedula_usuario");
            $table->string("celular_usuario");
            $table->string("correo_usuario");
            $table->string("password_usuario",250);
            $table->unsignedBigInteger("rol_fk");
            $table->unsignedBigInteger("status_fk");
            $table->boolean("delete_soft")->default(TRUE);
            $table->timestamps();


            $table->foreign('rol_fk')->references('id')->on('rol')->onDelete('cascade');
            $table->foreign('status_fk')->references('id')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
