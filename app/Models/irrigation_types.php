<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ...

class irrigation_types extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_arabic',
        'name_english',
        'agriculture_type_id',
    ];

    public function agricultureType()
    {
        return $this->belongsTo(agriculture_types::class, 'agriculture_type_id');
    }
}

