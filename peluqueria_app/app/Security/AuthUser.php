<?php

namespace App\Security;

use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\AuthResponse;


class AuthUser{


    protected Model $model;
    protected AuthResponse $response;
    protected $user_db;

    public function __construct(Model $model_)
    {
        $this->model = $model_;
        $this->response = new AuthResponse();
        
    }

    public function AuthLogin($ident_column,$ident_value, $pass, $colum_pass_name = "password"){

        try{

            $this->user_db = $this->model::where($ident_column, $ident_value)
            ->first();
            
        }catch(Exception $e){

            echo "error al buscar identificador y contraseña en Api" . $e->getMessage();
        }
        
        // var_dump($model_found);
        if(!empty($this->user_db) ){

            $hash = $this->user_db->$colum_pass_name;
            $ident_db = $this->user_db->$ident_column;


            if(!empty($hash) && !empty($ident_db)){

                if(password_verify($pass, $hash)){
    
                    $this->response->password_status = true;
                    $this->response->Messague = "Autentificacion exitosa";
                }
                
            }
    
            if(!empty($ident_value) && !empty($ident_db) && $this->response->password_status){
    
                if($ident_value == $ident_db){
    
                    $this->response->user_status = true;
                    $this->response->user_db = $this->user_db;
                }
            }
        }else{

            $this->response->Messague = "Error, No se encontraron datos asociados";
        }
        
        return $this->response;

    }

    
}