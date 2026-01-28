<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banares extends Model
{
    use HasFactory;

    protected $table = 'banares';
    protected $fillable = [
        'path',
        'main_sec_id',
        'sub_sec_id',
        'product_id',
        'click',
        'offers',
    ];
}
