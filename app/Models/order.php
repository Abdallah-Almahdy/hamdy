<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'totalPrice',
        'address',
        'phoneNumber',
        'delivery_id',
        'status',
        'payment_method',
        'promo_code_id',

    ];

    public function delivery(): HasOne
    {
        return $this->hasOne(delivery::class);
    }


    public function orderTracking(): HasMany
    {
        return $this->HasMany(orderTracking::class);
    }

    public function orderProducts(): HasMany
    {
        return $this->HasMany(orderProduct::class);
    }

    public function user_info(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
