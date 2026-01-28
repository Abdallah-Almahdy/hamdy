<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromoCode extends Model
{
    use HasFactory;

    protected $table = 'promo_codes';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'promo_cat',
        'type',
        'users_limit',
        'available_codes',
        'min_order_value',
        'discount_type',
        'discount_cash_value',
        'discount_percentage_value',
        'active',
        'user_id',
        'check_offer_rate',
        'expiry_date',
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'active' => 'boolean',
    ];

    /**
     * Relationship: A promo code can have many redemptions.
     */
    public function redemptions()
    {
        return $this->hasMany(PromoCodeRedemption::class, 'promo_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
