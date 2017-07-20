<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    public function seller()
    {
    	return $this->hasOne('App\seller','seller_id','product_seller_id');
    }
}
