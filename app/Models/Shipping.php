<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderDetails::class,'order_id', 'id');
    }
}
