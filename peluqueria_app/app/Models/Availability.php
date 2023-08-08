<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State_availability;
use App\Models\User;
use App\models\Service;

class Availability extends Model
{
    use HasFactory;

    protected $table = "availability";
    protected $fillable = ["user_fk","fecha_disponibilidad","hora_inicio_disponibilidad","hora_fin_disponibilidad","sede_fk",
    "state_availability_fk","notas_disponibilidad"];


    
    public function states_availability(){

        return $this->belongsTo(State_availability::class, "state_availability_fk","id");
        
    }

    public function user(){

        return $this->belongsTo(User::class, "user_fk","id");

    }

    public function service(){

        return $this->belongsTo(Service::class, "sede_fk","id");

    }

}

