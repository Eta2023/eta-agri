<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kingdom extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEng',
   
    ];
  
    public function phylums()
    {
        return $this->hasMany(Phylum::class);
    }
}
