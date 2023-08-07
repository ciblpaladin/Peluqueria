<?php

namespace App\Services;

use App\Interfaces\CrudInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

    class ModelCrud implements CrudInterface{

        protected Model $model_;

        public function set_model(Model $model ) {
            $this->model_ = $model;
        }

        public function all($tables_fk){

            try{

                if($tables_fk === null){

                    return $this->model_::where("delete_soft", 1)
                        ->orderBy("id")
                        ->take(1000)
                        ->get();
                }   
                else{
    
                    return $this->model_::with(...$tables_fk)
                        ->orderBy("id", "desc")    
                        ->where("delete_soft", 1)
                        ->take(1000)
                        ->get();
                      
                }
            }catch(Exception $e){

                return $this->model_::all();
            }
            
        }

        public function get($id, $tables_fk){

            if($tables_fk === null and !empty($id)){

                return $this->model_::find($id);
            }
            else{

                return $this->model_::with(...$tables_fk)->where("id",$id)->get();
                  
            }
            
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