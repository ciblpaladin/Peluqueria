<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\FilterColums;
use App\Security\AuthUser;
use Illuminate\Database\Eloquent\Model;

class AuthController extends Controller
{

    protected AuthUser $auth;
    public function __construct(Model $model_){

        $this->auth = new AuthUser($model_);

    }
    
    
    public function auth_model($ident, $value, $pass, $colum_pass_name = null){

       $res= $this->auth->AuthLogin($ident, $value, $pass, $colum_pass_name);
       return response()->json($res);

    }
}
