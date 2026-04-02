<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'withQnt',
        'qntStatus',
        'color',
        'maintenance_mode',
        'maintenance_message',
        'min_supported_version',
        'exact_blocked_version',
    ];

}
