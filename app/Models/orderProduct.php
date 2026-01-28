<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class orderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';
    protected $fillable = [
        'product_id',
        'order_id',
        'totalPrice',
        'totalCount'
    ];

    public function prodcut(): HasOne
    {
        return $this->hasOne(product::class);
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(order::class);
    }
}
