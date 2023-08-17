<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'parent_id',
        'level',
        'slug',
        'updated_at',
        'created_at'
    ];

    public function getCategoryChildren()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class,'category_id','id');
    }
}
