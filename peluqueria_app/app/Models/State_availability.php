<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State_availability extends Model
{
    use HasFactory;
    protected $table = "state_availability";
    protected $fillable = ["nombre_estado"];
}
