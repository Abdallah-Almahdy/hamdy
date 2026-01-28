<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $fillable = [
        'name',
        'description',
        'photo',
        'active'
    ];



    public function product(): HasMany
    {
        return $this->hasMany(product::class);
    }
    public function sub_section(): HasMany
    {
        return $this->hasMany(subSection::class);
    }
}
