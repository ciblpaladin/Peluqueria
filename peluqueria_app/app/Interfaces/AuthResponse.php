<?php
namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;

class AuthResponse{

    public string $Messague = "";
    public bool $password_status = false;
    public bool $user_status = false;
    public Model $user_db;

}