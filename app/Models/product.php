<?php

namespace App\Models;


use
    Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class  product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'description',
        'photo',
        'section_id',
        'company_id',
        'active',
        'qnt',
        'purchase_count',
        'offer_rate',
        'bar_code',
    ];


    public function section(): BelongsTo
    {
        return $this->belongsTo(subSection::class);
    }
    public function subSection(): BelongsTo
    {
        return $this->belongsTo(subSection::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(company::class);
    }

    public function orderProduct(): BelongsTo
    {
        return $this->belongsTo(orderProduct::class);
    }
    public function favorites(): HasMany
    {
        return $this->hasMany(favorites::class);
    }
}
