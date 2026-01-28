<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class linkedSections extends Model
{
    use HasFactory;

    protected $table = 'linked_sections';
    protected $fillable = [
        'main_section_id',
        'sub_section_id',
    ];


    public function mainSection()
    {
        return $this->belongsTo(section::class, 'main_section_id');
    }
}
