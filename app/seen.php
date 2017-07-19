<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seen extends Model
{
    //
    protected $table = 'seens';
    protected $fillable = ['product_id','seen_by'];
}
