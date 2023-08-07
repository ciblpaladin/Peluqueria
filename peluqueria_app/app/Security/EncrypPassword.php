<?php

namespace App\Security;

class EncrypPassword{



    public static function Encrypt($password){

        return password_hash($password, PASSWORD_DEFAULT);

    }

    
}