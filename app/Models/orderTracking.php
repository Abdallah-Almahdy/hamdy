<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  orderTracking extends Model
{
    use HasFactory;

    protected $table = 'order_tracking';
    protected $fillable = [
        'user_id',
        'order_id',
        'status',
    ];


    public function user_info(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order_info(): BelongsTo
    {
        return $this->belongsTo(order::class);
    }
}
