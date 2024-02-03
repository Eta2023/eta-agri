<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agriculture_types extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',   
    ];
    public function irrigationTypes()
    {
        return $this->hasMany(irrigation_types::class);
    }
}

