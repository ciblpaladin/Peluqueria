<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;


class FilterColums{

    protected $model_;

    public function set_model(Model $model)
    {
        $this->model_ = $model;
    }


    public function filterColums($table_filter){


        $data=$this->model_::where($table_filter)->get();
        

    }


}
