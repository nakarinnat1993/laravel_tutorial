<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeProduct extends Model
{
    //
    protected $table = 'type_products';
    protected $fillable = ['id','type_name'];


    public function product()
    {

        return $this->hasMany('App\Product');

    }
}
