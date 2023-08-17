<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = ['user_id','order_id','status'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'order_id', 'id');
    }
}
