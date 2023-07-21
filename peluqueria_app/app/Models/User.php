<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";
    // protected $attributes = ["nombre_usuario" => null, "apellidos_usuario" => null,"cedula_usuario" => null,"celular_usuario" => null];

    protected $fillable= ["nombre_usuario",
    "apellidos_usuario",
    "cedula_usuario",
    "celular_usuario",
    "correo_usuario",
    "password_usuario",
    "rol_fk",
    "status_fk",
    "delete_soft"];
}

