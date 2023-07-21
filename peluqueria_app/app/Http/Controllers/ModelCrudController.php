<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Services\ModelCrud;
use App\Services\TransformData;
use Illuminate\Database\Eloquent\Model;

class ModelCrudController extends Controller
{

    protected ModelCrud $crud;
    protected TransformData $transform_data;
    protected $model_;

    public function __construct(Model $model)
    {
        $this->crud = new ModelCrud();
        $this->transform_data = new TransformData();
        $this->model_ = $model;
        $this->crud->set_model($model);
    }

    public function index()
    {   

        $data = $this->crud->all();
        return response()->json($data);
    }


    public function create()
    {
        $model_create = $this->transform_data->transform_data_post($_SERVER, $this->model_, $_POST);
        return $this->crud->create($model_create);
    }

    public function show($id)
    {

        $model= $this->crud->get($id);
        return response()->json($model);

    }

    public function update($id)
    {
        $model = $this->transform_data->update_data($id, $this->model_,$_SERVER,$_POST);
        return $this->crud->update($model);
    }

    public function delete($id)
    {
        $this->crud->delete($id);
    }
}
