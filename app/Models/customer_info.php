<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class customer_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profileImage',
        'firstName',
        'lastName',
        'phonenum',
        'email',
        'addressCountry',
        'addresscity',
        'addressstreet',
        'addressbuildingNumber',
        'addressfloorNumber',
        'addressApartmentNumber',
        'disSign',
        'addressCountry2',
        'addresscity2',
        'addressstreet2',
        'addressbuildingNumber2',
        'addressfloorNumber2',
        'addressApartmentNumber2',
        'disSign2',
        'gender',
        'birthDate',
    ];
}
