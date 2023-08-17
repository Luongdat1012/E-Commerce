<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamps = true;
    protected $dates = ['created_at'];

    protected $fillable = ['user_id', 'sub_total', 'discount', 'total', 'name', 'phone', 'email', 'province', 'district', 'wards', 'status', 'address'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

    public function shipping(): HasMany
    {
        return $this->hasMany(Shipping::class, 'order_id', 'id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }

    function getProvince($id){
        return Province::find($id);
    }
    function getDistrict($id){
        return District::find($id);
    }

    function getWard($id){
        return Ward::find($id);
    }


}
