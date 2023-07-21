<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $table="diarys";

    protected $fillable= 
    ["empleado_fk",
    "cliente_fk",
    "servicio_fk",
    "sede_fk",
    "fecha_agenda",
    "hora_agenda",
    "delete_soft"];
}

