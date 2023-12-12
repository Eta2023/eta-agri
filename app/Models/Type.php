<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
        'note',
        'genus_id',
        
    ];
    public function Genuses()
    {
        return $this->belongsTo(Genus::class ,'genus_id'); // Assuming Classeta is the related model
    }
}
