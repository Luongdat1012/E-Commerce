<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['product_id','name'];

    public function products(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
