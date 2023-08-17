<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'sku', 'description', 'content', 'category_id', 'price', 'discount_number', 'active', 'photo', 'product_att_status','att_products'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function colors(): HasMany
    {
        return $this->hasMany();
    }

    public function getColor($id){
        return ProductColor::find($id);
    }

    public function getSize($id){
        return ProductSize::find($id);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class,'product_id','id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $product->gallery()->delete();
            $product->productDetail()->delete();
        });
    }
}
