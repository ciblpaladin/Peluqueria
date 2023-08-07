<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelCrudController;
use App\Http\Controllers\FilterController;
use App\http\Controllers\AuthController;
use App\Models\User;
use App\Models\Client;
use App\Models\Diary;
use App\Models\Rol;
use App\Models\Statu;
use App\Models\City;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//users-all()
Route::get("/users", fn() => (new ModelCrudController(new User()))->index(["rol","status"]));
//users-detail()
Route::get("/users/{id}", fn($id) => (new ModelCrudController(new User()))->show($id, ["rol","status"]));

//users-create()
Route::post("/users/create", fn() => (new ModelCrudController(new User()))->store(request()->all()));
//users-update()
Route::post("/users/update/{id}", fn($id) => (new ModelCrudController(new User()))->update($id, request()->all()));
//users-delete()
Route::post("/users/delete/{id}", fn($id) => (new ModelCrudController(new User()))->delete($id));
//user-selects
Route::get("/user/selects", fn() => (new ModelCrudController(new Statu()))->get_selects(

    array(array("model" => new Rol()), array("model" => new Statu()))
));

//user-filters
//filter-1 colum
Route::get("/filter/users/{colum}/{value}", fn($colum,$value) => (new FilterController(new User()))->filter($colum,$value, ["rol","status"]));

//==================================================================================================================================

//clients-all()
Route::get("/clients", fn() => (new ModelCrudController(new Client()))->index(["cities"]));
//clients-detail()
Route::get("/clients/{id}", fn($id) => (new ModelCrudController(new Client()))->show($id,["cities"]));

//clients-create()
Route::post("/clients/create", fn() => (new ModelCrudController(new Client()))->store(request()->all()));
//clients-update()
Route::post("/clients/update/{id}", fn($id) => (new ModelCrudController(new Client()))->update($id, request()->all()));
//clients-delete()
Route::post("/clients/delete/{id}", fn($id) => (new ModelCrudController(new Client()))->delete($id));
//clients-selects
Route::get("/client/selects", fn() => (new ModelCrudController(new Statu()))->get_selects(

    array(array("model" => new City()))
));
//clientes-filter
Route::get("/filter/clients/{colum}/{value}", fn($colum,$value) => (new FilterController(new Client()))->filter($colum,$value, ["cities"]));
// //==================================================================================================================================

//diarys-all()
Route::get("/diarys", fn() => (new ModelCrudController(new Diary()))->index());
//users-detail()
Route::get("/diarys/{id}", fn($id) => (new ModelCrudController(new Diary()))->show($id));

//diarys-create()
// Route::post("/diarys/create", fn() => (new ModelCrudController(new Diary()))->create());
//diarys-update()
Route::post("/diarys/update/{id}", fn($id) => (new ModelCrudController(new Diary()))->update($id, request()->all()));
//diarys-delete()
Route::post("/diarys/delete/{id}", fn($id) => (new ModelCrudController(new Diary()))->delete($id));

//==================================================================================================================================

//==================================================================================================================================
//get-selects----------------------
//rols
Route::get("/rols", fn() => (new ModelCrudController(new Rol()))->index());
//status
Route::get("/status", fn() => (new ModelCrudController(new Statu()))->index());



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////---Auth de tablas---///////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Uso: la clase AuthController se usara para autentificar un modelo o tabla que contenga una columna de password
// Se pasaran a ella una instancia de la clase del modelo a autentificar, el nombre del identificador de un registro Ejemplo "Cedula", "Usuario generado", "correo"-
// adiccionalemnte se añaden los parametros {{ $ident_column,$ident_value, $pass, -- opcional "$colum_pass_name" }}

// Donde $ident_colum es el nombre de la columna identificadora de la tabla
// $ident_value = valor que se envia desde en cliente
// $pass = contraseña ingresada por el usuario en algun tipo de login o autenticador
//"$colum_pass_name = nombre de la columna que contiene el hash de la contraseña, por defecto esta "password" el nombre en us tabla es diferente por favor añadirlo.

Route::post("/auth/{ident_column}/{ident_value}/{pass}", fn($ident_column,$ident_value, $pass) => 

            (new AuthController(new User()))->auth_model($ident_column,$ident_value, $pass, "password_usuario"));