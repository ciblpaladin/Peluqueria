<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelCrudController;
use App\Http\Controllers\FilterController;
use App\Models\User;
use App\Models\Client;
use App\Models\Diary;

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
Route::get("/users", fn() => (new ModelCrudController(new User()))->index());
//users-detail()
Route::get("/users/{id}", fn($id) => (new ModelCrudController(new User()))->show($id));

//users-create()
Route::post("/users/create", fn() => (new ModelCrudController(new User()))->create());
//users-update()
Route::post("/users/update/{id}", fn($id) => (new ModelCrudController(new User()))->update($id));
//users-delete()
Route::post("/users/delete/{id}", fn($id) => (new ModelCrudController(new User()))->delete($id));

//==================================================================================================================================

//clients-all()
Route::get("/clients", fn() => (new ModelCrudController(new Client()))->index());
//clients-detail()
Route::get("/clients/{id}", fn($id) => (new ModelCrudController(new Client()))->show($id));

//clients-create()
Route::post("/clients/create", fn() => (new ModelCrudController(new Client()))->create());
//clients-update()
Route::post("/clients/update/{id}", fn($id) => (new ModelCrudController(new Client()))->update($id));
//clients-delete()
Route::post("/clients/delete/{id}", fn($id) => (new ModelCrudController(new Client()))->delete($id));

//==================================================================================================================================

//diarys-all()
Route::get("/diarys", fn() => (new ModelCrudController(new Diary()))->index());
//users-detail()
Route::get("/diarys/{id}", fn($id) => (new ModelCrudController(new Diary()))->show($id));

//diarys-create()
Route::post("/diarys/create", fn() => (new ModelCrudController(new Diary()))->create());
//diarys-update()
Route::post("/diarys/update/{id}", fn($id) => (new ModelCrudController(new Diary()))->update($id));
//diarys-delete()
Route::post("/diarys/delete/{id}", fn($id) => (new ModelCrudController(new Diary()))->delete($id));

//==================================================================================================================================
//filter-models----------------------

Route::get("/filter/users", fn() => (new FilterController(new User()))->filter(["status_fk"=>40,"nombre_usuario" =>"dedrihc"]));