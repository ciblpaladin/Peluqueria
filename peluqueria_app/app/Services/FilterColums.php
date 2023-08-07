<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;


class FilterColums{

    protected $model_;

    public function set_model(Model $model)
    {
        $this->model_ = $model;
    }


    public function filterColums($column,$value,$tables=null){

        return $this->model_::with(...$tables)
            ->where($column, "like","%".$value."%")
            
            ->get();
        //$posts = Post::where('title', 'like', '%'.$keyword.'%')->get();
    }


}
