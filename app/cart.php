<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    protected $fillable = ['cart_buyer_id','cart_qty','cart_product_id'];
    public function seller()
    {
    	return $this->hasOne('App\seller','seller_id','product_seller_id');
    }
}
