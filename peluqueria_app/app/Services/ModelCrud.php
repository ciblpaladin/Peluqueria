<?php

namespace App\Services;

use App\Interfaces\CrudInterface;
use Illuminate\Database\Eloquent\Model;



    class ModelCrud implements CrudInterface{

        protected Model $model_;

        public function set_model(Model $model ) {
            $this->model_ = $model;
        }

        public function all(){

            return $this->model_::where("delete_soft",1)->get();

        }

        public function get($id){

            return $this->model_::find($id);
            
        }

        public function create(Model $model){

            return $model->save();
            
        }

        public function update(Model $model){

            return $model->save();
        }

        public function delete($id){

            $model_delete = $this->model_::find($id);
            $model_delete->delete_soft = 0;
            $model_delete->save();
            return $model_delete;

        }


    }

















?>