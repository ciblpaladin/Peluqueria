<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FilterColums;
use Illuminate\Database\Eloquent\Model;

class FilterController extends Controller
{
    protected FilterColums $filter_;
    protected Model $model_;

    public function __construct(Model $model)
    {
        $this->filter_ = new FilterColums();
        $this->model_ = $model;
        $this->filter_->set_model($model);
        
    }
    public function filter($column, $values, $tables = null){

        $data_model = $this->filter_->filterColums($column, $values, $tables);

        if(empty($data_model)){
            echo "No se encontraron datos";
        }else{
            return response()->json($data_model);
        }
        
    }

}
