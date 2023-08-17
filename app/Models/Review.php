<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $table =  'reviews';
    protected $fillable = ['rating','comment','order_detail_id','product_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetails::class,'order_detail_id','id');
    }
}
