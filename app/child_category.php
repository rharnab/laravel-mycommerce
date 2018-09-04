<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class child_category extends Model
{
    protected $table='tbl_category';

    public function childs(){
    	return $this->hasMany('app\child_category', 'parent_id');
    }
}
