<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    public function rating()
    {
    	return $this->hasMany('App\rate','rate_product_id','product_id');
    }
}
