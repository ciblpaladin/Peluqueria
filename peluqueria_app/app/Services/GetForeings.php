<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;


class GetForeings{

    public function getAllForeingsModel($foreings){

        $foreings_dict = array();
        
        if(!empty($foreings)){
            
            foreach ($foreings as $tables) {
                $foreings_dict[class_basename($tables["model"])] = $tables["model"]::all();
            }

            
            return $foreings_dict;
        }
        
    }

}
