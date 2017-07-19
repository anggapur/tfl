<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function child()
    {
    	return $this->hasMany('App\category','category_parent_id','category_id');
    }
}
