<?php

namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface{



public function all();
public function get($id);
public function create(Model $model);
public function update(Model $model);
public function delete($id);

}















?>