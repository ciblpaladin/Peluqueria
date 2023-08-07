<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Client extends Model
{
    use HasFactory;

    protected $table="clients";

    protected $fillable= 
    ["nombre_cliente",
    "apellidos_cliente",
    "cedula_cliente",
    "celular_cliente",
    "correo_cliente",
    "password_cliente",
    "ciudad_fk",
    "delete_soft"];

    public function cities(){

        return $this->belongsTo(City::class, "ciudad_fk","id");
    }
}

