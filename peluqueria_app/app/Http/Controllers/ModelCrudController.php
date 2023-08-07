<?php

namespace App\Http\Controllers;


use App\Services\ModelCrud;
use App\Services\TransformData;
use Illuminate\Database\Eloquent\Model;
use App\Services\GetForeings;
use Illuminate\Http\Request;
use App\Interfaces\ResponseApi;
use Exception;

class ModelCrudController extends Controller
{

    protected ModelCrud $crud;
    protected TransformData $transform_data;
    protected $model_;
    protected GetForeings $foreings_;
    protected ResponseApi $res;
    public function __construct(Model $model)
    {
        $this->crud = new ModelCrud();
        $this->transform_data = new TransformData();
        $this->model_ = $model;
        $this->crud->set_model($model);
        $this->foreings_ = new GetForeings();
        $this->res = new ResponseApi();
    }

    public function index($tables_fk = null)
    {   

        $data = $this->crud->all($tables_fk);
        return response()->json($data);
    }


    public function store($request)
    {   
        $model_create = $this->transform_data->transform_data_post($_SERVER, $this->model_, $request);
        try{

            if($this->crud->create($model_create)){

                $this->res->status =  true;
                $this->res->message = "Creacion ejecutada con exito";
            }
            }catch(Exception $e){

                $this->res->status = false;
                $this->res->message = "Error al crear cliente : ". $e->getMessage();
            }
        
        return response()->json($this->res);
    }

    public function show($id, $tables_fk=null)
    {

    
        $model= $this->crud->get($id, $tables_fk);
        return response()->json($model);

    }

    public function update($id, $request)
    {
        $model = $this->transform_data->update_data($id, $this->model_,$_SERVER,$request);
        return $this->crud->update($model);
    }

    public function delete($id)
    {
        $this->crud->delete($id);
    }

    public function get_selects(array $selects){

        $foreings_= $this->foreings_->getAllForeingsModel($selects);
        return response()->json($foreings_);
    }

    // $foreings_= $this->foreings_->getAllForeingsModel(array(array("model"=>new Rol()),  array("model"=>new Statu())));
}
