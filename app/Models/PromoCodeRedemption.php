<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodeRedemption extends Model
{
    use HasFactory;

    protected $table = 'promo_code_redemptions';

    protected $fillable = [
        'promo_id',
        'user_phone_token',
        'used_at',
    ];

    protected $casts = [
        'used_at' => 'datetime',
    ];

    /**
     * Each redemption belongs to one promo code.
     */
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_id');
    }
}
