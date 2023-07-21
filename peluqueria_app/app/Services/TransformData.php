<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use App\Security\EncrypPassword;

class TransformData{



    public function transform_data_post($server,Model $model, $post){

        $keys = $post;
        $data_keys = array_keys($keys);
        
        if($server["REQUEST_METHOD"] == "POST"){
            
            foreach($data_keys as $key){
                if(strpos($key, "password") !== False){

                    $model->$key = EncrypPassword::Encrypt($post[$key]);
                    
                }else{

                    $model->$key = $post[$key];
                }
                    
            }   
        }
        else{

            echo "error";
        } 

        return $model;

    }

    public function update_data($id, Model $model, $server, $post){

        $model_find = $model::find($id);
        $keys = $post;
        $data_keys = array_keys($keys);
        
        if($server["REQUEST_METHOD"] == "POST"){
            
            foreach($data_keys as $key){
                
                    $model_find->$key = $post[$key];
                    

            }
        }
        else{

            echo "error";
        } 

        return $model_find;

    }


}

// def transform_data_post(self, request, model, foreings):
         
//     models = {}
//     
//     if request.method == "POST":
//             print("en post")
//             for key, value in request.POST.items():
                
//                 print(f"key{key}, value{value}")
//                 if key != "csrfmiddlewaretoken" and  key !=  "password_confirm":
//                     if key in foreings:

//                         model = foreings[key]
//                         class_ = model.objects.get(id=value)
//                         models[key] = class_
                        
//                     else:
                        
//                         models[key] = value
        
//     return models