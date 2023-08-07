<?php

namespace App\Interfaces;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface{



public function all($tables_fk);
public function get($id, $tables_fk);
public function create(Model $model);
public function update(Model $model);
public function delete($id);

}















?>