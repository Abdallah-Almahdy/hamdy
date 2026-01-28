<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodeUser extends Model
{
    use HasFactory;

    protected $table = 'promo_code_users';

    protected $fillable = [
        'user_phone_token',
        'used',
        'used_at',
        'order_id',
        'user_id',
        'promo_id',
    ];

    protected $casts = [
        'used' => 'boolean',
        'used_at' => 'datetime',
    ];

    /**
     * Relationship: Each promo usage is linked to a specific promo code.
     */
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_id');
    }

    /**
     * Relationship: Each promo usage is linked to a specific order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
