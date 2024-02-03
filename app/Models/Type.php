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
    public function genus()
    {
        return $this->belongsTo(Genus::class, 'genus_id');
    }
  
    public function pesticides()
{
    return $this->belongsToMany(Pesticide::class, 'pesticide_types');
}
    
}

