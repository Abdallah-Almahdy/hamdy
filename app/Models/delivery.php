<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';
    protected $fillable = [
        'name',
        'delivery_price',
        'active',
    ];
}
