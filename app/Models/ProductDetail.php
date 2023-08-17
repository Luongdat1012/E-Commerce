<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    protected $fillable = ['id','product_id','size_id','color_id','sku','quantity','price','rstatus'];

    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');
    }


}
