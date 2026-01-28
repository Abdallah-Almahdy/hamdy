<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }
}
