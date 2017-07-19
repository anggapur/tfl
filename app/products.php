<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

	
	public function reviewRows()
	{
	    return $this->hasManyThrough('App\rate', 'App\products','product_id','rate_product_id','product_id');
	}
	public function avgRating()
	{
	    return $this->reviewRows()
	      ->selectRaw('avg(star) as aggregate')
	      ->groupBy('rate_product_id');
	}
    public function rate()
    {
    	return $this->hasMany('App\rate','rate_product_id','product_id');
    }
    public function seen()
    {
    	return $this->hasMany('App\seen','product_id','product_id');
    }
    public function category()
    {
    	return $this->hasOne('App\category','category_id','product_category_id');
    }
    public function seller()
    {
    	return $this->hasOne('App\seller','seller_id','product_seller_id');
    }
    public function images()
    {
    	return $this->hasMany('App\image','product_id','product_id');
    }
}
