<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'note',
        'class_id',
        
    ];
    public function classetas()
    {
        return $this->belongsTo(Classeta::class ,'class_id'); // Assuming Classeta is the related model
    }
}



